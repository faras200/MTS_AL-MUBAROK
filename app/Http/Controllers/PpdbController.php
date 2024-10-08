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
            'ppdb' => Ppdb::where('id', $id)->first(),
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
            // Cari data yang akan di-update
            $ppdb = Ppdb::findOrFail($id);

            // Update data yang ada
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

            // Simpan perubahan
            $ppdb->save();

            // Commit transaksi jika tidak ada error
            DB::commit();

            return redirect('/dashboard/ppdb')->with('success', 'Berhasil Mengubah Data Ppdb!!');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();

            // Kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
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
