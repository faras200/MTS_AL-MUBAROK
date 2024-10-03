<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use App\Models\Ormawa;
use App\Models\Pengajuan;
use App\Models\Persetujuan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = null;
        if (auth()->user()->role == 'siswa') {
            $data = Ppdb::where('user_id', auth()->user()->id)->get();
        } else {
            $data = Ppdb::latest()->get();
        }
        return view('dashboard.ppdb.index', [
            'datas' => $data,
        ]);
    }

    public function arsip()
    {
        // $persetujuan = Persetujuan::approve()->get();
        // foreach($persetujuan as $p ){
        //     $pengajuan[] = Pengajuan::firstwhere('persetujuan_id', $p->id);
        // }
        $role = auth()->user()->role;
        if ($role != 'upt_it') {
            $persetujuan = Persetujuan::approve()->get();
            if ($persetujuan->isEmpty()) {
                $pengajuan = null;
            } else {
                foreach ($persetujuan as $p) {
                    $pengajuan[] = pengajuan::firstwhere('persetujuan_id', $p->id);
                }
            }
        } else {
            $pengajuan = Pengajuan::latest()->where('status', '=', 'setuju')->get();
        }
        return view('dashboard.ppdb.arsip', [
            'pengajuans' => Str::is($role, 'upt_it') ? $pengajuan : @array_reverse($pengajuan),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ppdb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hp' => 'required|numeric',
            'nisn' => 'required|numeric',
            'ktp' => 'required|numeric',
            'kk' => 'nullable|numeric',
            'akte' => 'nullable|numeric',
            'ijazah' => 'required|string|max:255',
            'foto' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ]);

        // Gunakan transaksi untuk memastikan integritas data
        DB::beginTransaction();

        try {
            // Simpan data ke database
            $ppdb = new Ppdb();
            $ppdb->user_id = $user->id;
            $ppdb->name = $validatedData['name'];
            $ppdb->no_hp = $validatedData['hp'];
            $ppdb->nisn = $validatedData['nisn'];
            $ppdb->ktp = $validatedData['ktp'];
            $ppdb->kk = $validatedData['kk'];
            $ppdb->akte = $validatedData['akte'];
            $ppdb->ijazah = $validatedData['ijazah'];
            $ppdb->foto = $validatedData['foto'];
            $ppdb->alamat = $validatedData['alamat'];
            $ppdb->created_at = now();

            // Simpan data
            $ppdb->save();

            // Commit transaksi jika tidak ada error
            DB::commit();

            // Redirect ke halaman sebelumnya dengan pesan sukses
            return redirect('/dashboard/ppdb')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();

            // Kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_arsip($id)
    {
        return view('dashboard.ppdb.detail_arsip', [
            'pengajuan' => Pengajuan::where('id', $id)->first()
        ]);
    }
    public function show($id)
    {
        return view('dashboard.ppdb.show', [
            'pengajuan' => Pengajuan::where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.ppdb.edit', [
            'pengajuan' => Pengajuan::where('id', $id)->first(),
        ]);
    }
    public function status($id)
    {
        return view('dashboard.ppdb.status', [
            'pengajuan' => Pengajuan::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->input());
        if ($request->input('acc')) {
            Persetujuan::where('id', $request->input('persetujuan_id'))->update([
                auth()->user()->role => '2',
            ]);
            if (auth()->user()->role == 'baak') {
                Pengajuan::where('id', $id)->update(['status' => 'setuju']);
                $pengajuan = Pengajuan::firstwhere('id', $id);
                $data['jenis'] = $pengajuan->jenis;
                $data['view'] = 'emailku';
                $data['pengaju'] = null;
                $data['subjek'] = $pengajuan->subjek;
                $data['objek'] = 'Pengajuan Berhasil Disetujui';
                $data['pesan_status'] = 'Selamat Pengajuan Anda Berhasil Disetujui';
                Mail::to("farasaldi30@gmail.com")->send(new EmailNotification($data));
            }
            return redirect('/dashboard/ppdb')->with('success', 'Berhasil Menyetujui Ppdb!!');
        } elseif ($request->input('revisi')) {
            Pengajuan::where('id', $id)->update([
                'catatan_revisi' => $request->input('catatan_revisi'),
                'status' => 'revisi'
            ]);
            return redirect('/dashboard/ppdb')->with('success', 'Berhasil Menyimpan Catatan Revisi !!');
        } elseif ($request->input('tolak')) {
            Pengajuan::where('id', $id)->update([
                'status' => 'tolak'
            ]);
            return redirect('/dashboard/ppdb')->with('success', 'Pengajuan ditolak!!');
        }
        $validasi = $request->validate([
            'subjek' => 'required',
            'jenis' => 'required',
            'file' => 'required',
        ]);
        Persetujuan::where('id', $request->input('persetujuan_id'))->update([
            'baak' => $request->input('baak'),
            'warek' => $request->input('warek', '0'),
            'bem' => $request->input('bem', '0'),
            'dema' => $request->input('dema', '0')
        ]);

        Pengajuan::where('id', $id)->update($validasi);
        return redirect('/dashboard/ppdb')->with('success', 'Berhasil Mengubah Data Ppdb!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Ppdb::destroy($id);
        return redirect('/dashboard/ppdb')->with('success', 'Berhasil Menghapus Data Ppdb!!');
    }
}
