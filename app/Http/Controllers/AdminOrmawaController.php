<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminOrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin-ormawa.index', [
            'admins' => User::where('role', 'panitia')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin-ormawa.create', [
            'ormawas' => Ormawa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:5', 'max:20', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validasi['password'] = Hash::make($validasi['password']);
        $validasi['role'] = 'panitia';

        User::create($validasi);

        //$request->session()->flash('success', 'Registrasi Berhasil !! Silahkan Login  ');

        return redirect('/dashboard/panitia')->with('success', 'Berhasil Menambah Data Panitia!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.admin-ormawa.edit', [
            'admin' => User::where('id', $id)->first()
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
        $rules = [
            'name' => 'required|max:255',
        ];
        $emails = User::where('id', $id)->get();
        foreach ($emails as $email) :
            if ($request->email != $email->email) {
                $rules['email'] = 'required|unique:users';
            } elseif ($request->username != $email->username) {
                $rules['username'] = 'required|unique:users';
            }
        endforeach;

        if (!is_null($request->password)) {
            $rules['password'] = 'required|min:8';
            $validasi = $request->validate($rules);
            $validasi['password'] = Hash::make($validasi['password']);
        } else {
            $validasi = $request->validate($rules);
        }

        User::where('id', $id)
            ->update($validasi);

        return redirect('/dashboard/panitia')->with('success', 'Berhasil Mengubah Panitia!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);

        return redirect('/dashboard/panitia')->with('success', 'Berhasil Menghapus Panitia!!');
    }
}
