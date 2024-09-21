<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Ormawa;
use App\Models\Anggota;
use App\Models\Category;
use App\Models\Pengajuan;
use App\Models\Persetujuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $ajuan = null;
        if (auth()->user()->role == 'bem' || auth()->user()->role == 'dema') {
            $ajuan = Pengajuan::where('ormawa_id', auth()->user()->ormawa_id)->get();
        }
        return view('dashboard.index', [
            'admin' => Admin::count(),
            'anggota' => Anggota::count(),
            'ormawa' => Ormawa::count(),
            'post' => Post::count(),
            'category' => Category::count(),
            'dana' => Dana::count(),
            'ajuan' => $ajuan,
        ]);
    }
}
