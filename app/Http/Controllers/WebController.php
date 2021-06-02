<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Post\Post;
use App\Models\Post\Post as Page;
use App\Models\User;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function post($post)
    {
        $post = Post::where('slug', $post)->first();
        $user = User::find($post->user_id);
        if(!$post){
            return redirect()->route('beranda')->withError('Berita Tidak Lengkap, Hubungi Admin');
        }

        return view('web.post', compact('post'));
    }

    public function page($page)
    {
        $menu = Menu::where('slug', $page)->first();
        $page = Page::where('type', 'page')->where('type_id', $menu->id)->first();
        $user = User::find(data_get($page,'user_id'));

        if(!$page){
            return redirect()->route('beranda')->withError('Halaman Belum Tersedia, Hubungi Admin');
        }

        return view('web.page', compact('page', 'user'));
    }
}
