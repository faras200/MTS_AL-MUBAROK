<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Ormawa;
use App\Models\Anggota;
use App\Models\Category;
use App\Models\Pengajuan;
use App\Models\Persetujuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ppdb;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'admin' => Admin::count(),
            'siswa' => User::where('role', 'siswa')->count(),
            'panitia' => User::where('role', 'panitia')->count(),
            'post' => Post::count(),
            'ppdb' => Ppdb::latest()->take(5)->get(),
        ]);
    }
}
