<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Post\Post;
use App\Models\Post\Post as Page;
use App\Models\User;
use App\Models\Polling;

class WebController extends Controller
{
    public function populer()
    {
        return Post::whereHas('category', function($query){
            $query->where('name', '=', 'berita');
        })->where('type', 'post')->orderBy('read', 'DESC')->take(5)->get();
    }

    // public function news()
    // {
    //     return Post::whereHas('category', function($query){
    //         $query->where('name', '=', 'berita');
    //     })->where('type', 'post')->orderBy('created_at', 'DESC')->take(5)->get();
    // }

    public function article($category)
    {
        return Post::whereHas('category', function($query) use ($category) {
            $query->where('name', '=', $category);
        })->where('type', 'post')->orderBy('created_at', 'DESC')->take(5)->get();
    }

    // public function announcement()
    // {
    //     return Post::whereHas('category', function($query){
    //         $query->where('name', '=', 'pengumuman');
    //     })->where('type', 'post')->orderBy('created_at', 'DESC')->take(5)->get();
    // }

    // public function agenda()
    // {
    //     return Post::whereHas('category', function($query){
    //         $query->where('name', '=', 'agenda');
    //     })->where('type', 'post')->orderBy('created_at', 'DESC')->take(5)->get();
    // }

    // public function agenda()
    // {
    //     return Post::whereHas('category', function($query){
    //         $query->where('name', '=', 'agenda');
    //     })->where('type', 'post')->orderBy('created_at', 'DESC')->take(5)->get();
    // }

    public function polling()
    {
        $polling = Polling::where('type', 'question')->first();
        $polling['answer'] = Polling::where('parent', data_get($polling,'id'))->get();
        return $polling;
    }

    public function index()
    {
        $populer = $this->populer();
        $polling = $this->polling();
        $news = $this->article('berita');
        $agenda = $this->article('agenda');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $national = $this->article('nasional');


        return view('web.index', compact('news', 'populer', 'agenda', 'polling', 'article', 'announcement', 'national'));
    }

    public function post($post)
    {
        $populer = $this->populer();
        $polling = $this->polling();
        $news = $this->article('berita');
        $agenda = $this->article('agenda');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');

        $post = Post::where('slug', $post)->first();
        $user = User::find(data_get($post,'user_id'));

        $read = $post->update(['read' => $post->read + 1]);

        if(!$post){
            return redirect()->route('beranda')->withError('Berita Tidak Lengkap, Hubungi Admin');
        }

        return view('web.post', compact('post', 'user', 'news', 'populer', 'agenda', 'polling'));
    }

    public function page($page)
    {
        $populer = $this->populer();
        $polling = $this->polling();
        $news = $this->article('berita');
        $agenda = $this->article('agenda');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');

        $menu = Menu::where('slug', $page)->first();
        $page = Page::where('type', 'page')->where('type_id', $menu->id)->first();
        $user = User::find(data_get($page,'user_id'));

        if(!$page){
            return redirect()->route('beranda')->withError('Halaman Belum Tersedia, Hubungi Admin');
        }

        return view('web.page', compact('page', 'user', 'news', 'populer', 'agenda', 'polling'));
    }

    public function page_polling($id)
    {
        $populer = $this->populer();
        $polling = $this->polling();
        $news = $this->article('berita');
        $agenda = $this->article('agenda');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');

        $result = Polling::find($id);
        $result['answer'] = Polling::where('parent', $id)->get();

        return view('web.page-polling', compact('result', 'news', 'populer', 'agenda', 'polling'));
    }

    public function vote_polling()
    {
        $polling = Polling::find(request()->input('vote'));
        $polling->score = $polling->score + 1;
        $polling->save();

        return redirect()->route('polling', $polling->parent);
    }
}
