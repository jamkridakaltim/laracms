<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Post\Post;
use App\Models\Post\Post as Page;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function post($post)
    {
        $post = Post::where('slug', $post)->first();
        if(!$post){
            return redirect()->route('beranda')->withError('Berita Tidak Lengkap, Hubungi Admin');
        }
        return view('web.post', compact('post'));
    }

    public function page($page)
    {
        $menu = Menu::where('slug', $page)->first();
        $page = Page::where('type', 'page')->where('type_id', $menu->id)->first();

        if(!$page){
            return redirect()->route('beranda')->withError('Halaman Belum Tersedia, Hubungi Admin');
        }

        return view('web.page', compact('page'));
    }
}
