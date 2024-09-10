<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view(
            'guests.posts.index',
            [
                "title" => "All Post",
                "image" => '../images/bg1.jpg' ,
                "active" => "home",
                "post" => Post::with(['category','user'])->latest()->filter(request(['search', 'category', 'authors']))->paginate(5)->withQueryString()
            ]
        );
    }
    public function blog()
    {
        return view(
            'blog',
            [
                "title" => "Blog",
                "active" => "blog",
                "nama" => "Farras Aldi Alfikri",
                "nim" => "1804030114",
                // "post" => Post::all()
                "post" => Post::latest()->get()
            ]
        );
    }
    public function show(Post $post)
    {
        return view('guests.posts.post', [
            "title" => "Single Post",
            "active" => "home",
            "post" => $post
        ]);
    }
    public function home(){
        return view('guests.index', [
            "beritas" => Post::latest()->filter(['category' => 'berita'])->limit(2)->get(),
            "kegiatans" => Post::latest()->filter(['category' => 'kegiatan'])->limit(3)->get(),
            'ormawas' => User::with('ormawa')->limit(4)->get(),
        ]);
    }
}
