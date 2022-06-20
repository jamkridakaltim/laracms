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

class RecruitmentController extends Controller
{
    public function index()
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

        return view('web.recruitment.index', compact(
            'news',
            'video',
            'populer',
            'agenda',
            'polling',
            'link'
        ));
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }

    public function populer()
    {
        return Post::whereHas('category', function ($query) {
            $query->where('name', '=', 'berita');
        })->where('type', 'post')->active()->orderBy('read', 'DESC')->take(5)->get();
    }

    public function article($category)
    {
        return Post::whereHas('category', function ($query) use ($category) {
            $query->where('name', '=', $category);
        })->where('type', 'post')->active()->orderBy('created_at', 'DESC')->take(5)->get();
    }

    public function polling()
    {
        $polling = Polling::where('type', 'question')->first();
        $polling['answer'] = Polling::where('parent', data_get($polling, 'id'))->get();

        return $polling;
    }
}
