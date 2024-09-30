<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('guests.register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        if (!$validasi) {
            return back()->with('loginError', 'Register Gagal');
        }

        $validasi['password'] = Hash::make($validasi['password']);
        $validasi['role'] = 'siswa';
        $validasi['username'] = Str::slug($request->name, '-');

        User::create($validasi);

        return redirect('/login')->with('success', 'Registrasi Berhasil !! Silahkan Login');
    }
}
