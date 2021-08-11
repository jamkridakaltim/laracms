<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Post\Post;
use App\Models\Post\Post as Page;
use App\Models\User;
use App\Models\File;
use App\Models\Link;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Polling;
use App\Models\Agenda;

class WebController extends Controller
{
    public function index()
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $national = $this->article('nasional');
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        // dd($polling != null ? 'true' : 'false');


        return view('web.index', compact('news', 'populer', 'agenda', 'polling', 'article', 'announcement', 'national', 'image', 'video', 'link'));
    }

    public function post($post)
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        $post = Post::where('slug', $post)->first();
        $user = User::find(data_get($post,'user_id'));

        $read = $post->update(['read' => data_get($post,'read',0) + 1]);

        if(!$post){
            return redirect()->route('beranda')->withError('Berita Tidak Lengkap, Hubungi Admin');
        }

        return view('web.post', compact('post', 'user', 'news', 'populer', 'agenda', 'polling', 'image', 'video', 'link'));
    }

    public function page($page)
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        $menu = Menu::where('slug', $page)->first();
        $page = Page::where('type', 'page')->where('type_id', $menu->id)->first();
        $user = User::find(data_get($page,'user_id'));

        if(!$page){
            return redirect()->route('beranda')->withError('Halaman Belum Tersedia, Hubungi Admin');
        }

        return view('web.page', compact('page', 'user', 'news', 'populer', 'agenda', 'polling', 'image', 'video', 'link'));
    }

    public function agenda()
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);
        $listAgenda = Agenda::orderBy('created_at', 'DESC')->paginate(15);

        // $menu = Menu::where('slug', $page)->first();
        // $page = Page::where('type', 'page')->where('type_id', $menu->id)->first();
        // $user = User::find(data_get($page,'user_id'));

        // if(!$page){
        //     return redirect()->route('beranda')->withError('Halaman Belum Tersedia, Hubungi Admin');
        // }

        return view('web.agenda', compact('news', 'populer', 'agenda', 'polling', 'image', 'video', 'link', 'listAgenda'));
    }

    public function populer()
    {
        return Post::whereHas('category', function($query){
            $query->where('name', '=', 'berita');
        })->where('type', 'post')->active()->orderBy('read', 'DESC')->take(5)->get();
    }

    public function article($category)
    {
        return Post::whereHas('category', function($query) use ($category) {
            $query->where('name', '=', $category);
        })->where('type', 'post')->active()->orderBy('created_at', 'DESC')->take(5)->get();
    }

    public function polling()
    {
        $polling = Polling::where('type', 'question')->first();
        $polling['answer'] = Polling::where('parent', data_get($polling,'id'))->get();

        return $polling;
    }

    public function page_polling($id)
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        $result = Polling::find($id);
        $result['answer'] = Polling::where('parent', $id)->get();
        $result['total'] = Polling::where('parent', $id)->get()->sum('score');

        return view('web.page-polling', compact('result', 'news', 'populer', 'agenda', 'polling', 'image', 'video', 'link'));
    }

    public function vote_polling()
    {
        $polling = Polling::find(request()->input('vote'));
        $polling->score = $polling->score + 1;
        $polling->save();

        return redirect()->route('polling', $polling->parent)->withMessage('Terima kasih atas partisipasi anda');
    }

    public function foto_page()
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $gallery = Gallery::image()->where('featured', 1)->paginate(9);
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        return view('web.foto-page', compact('news', 'populer', 'agenda', 'polling', 'gallery', 'image', 'video', 'link'));
    }

    public function foto_show($slug)
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $gallery = Gallery::image()->where('slug',$slug)->get();
        $image = new File;

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        $sub = $slug;

        return view('web.foto-show', compact('news', 'populer', 'agenda', 'polling', 'gallery', 'sub', 'image', 'video', 'link'));
    }

    public function video_page()
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');

        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $listVideo = Gallery::video()->paginate();
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        $image = new File;

        return view('web.video-page', compact('news', 'populer', 'agenda', 'polling', 'image', 'video', 'listVideo', 'link'));
    }

    public function contact_page()
    {
        $populer = $this->populer();
        $polling = $this->polling();

        $news = $this->article('berita');
        $article = $this->article('artikel');
        $announcement = $this->article('pengumuman');
        $video = Gallery::video()->orderBy('created_at', 'DESC')->paginate(2);
        $image = new File;
        $link = Link::paginate(5);
        $agenda = Agenda::orderBy('created_at', 'DESC')->paginate(5);

        return view('web.contact-page', compact('news', 'populer', 'agenda', 'polling', 'image', 'video', 'link'));
    }

    public function contact_send()
    {
        Contact::create([
            'name' => request()->input('name'),
            'phone' => request()->input('phone'),
            'email' => request()->input('email'),
            'message' => request()->input('message'),
        ]);

        return redirect()->back()->withMessage('Pesan Anda Telah Dikirim');
    }
}
