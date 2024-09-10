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
        if(auth()->user()->role != 'upt_it'){
            if(auth()->user()->role == 'baak' || auth()->user()->role == 'warek' ||auth()->user()->role == 'bem' || auth()->user()->role == 'dema'){
            $persetujuan = Persetujuan::notapprove()->get();
                if($persetujuan->isEmpty()){
                    $pengajuan = null;
                }else{
                    foreach($persetujuan as $p ){
                        $pengajuan[] = pengajuan::firstwhere('persetujuan_id', $p->id) ;
                    }
                }
            }else if(auth()->user()->role == 'ormawa')
            {
                $pengajuan = Pengajuan::latest()->where('ormawa_id', auth()->user()->ormawa_id)->get();
            }
        }else{
            $pengajuan = Pengajuan::where('status', '!=', 'setuju')->get();
        }
        //dd($pengajuan);
        // if(isset($pengajuan)){

        // }
        $ajuan = null ;
        if(auth()->user()->role == 'bem' || auth()->user()->role == 'dema'){
            $ajuan = Pengajuan::where('ormawa_id', auth()->user()->ormawa_id)->get();
        }
        return view('dashboard.index' , [
            'admin' => Admin::count(),
            'anggota' => Anggota::count(),
            'pengajuan' => Pengajuan::count(),
            'ormawa' => Ormawa::count(),
            'post' => Post::count(),
            'category' => Category::count(),
            'dana' => Dana::count(),
            'pengajuans' => $pengajuan,
            'ajuan' => $ajuan,
        ]);
    }
}
