<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\File;
use App\Models\Post\Post;
use App\Models\Post\Category;


class PostController extends Controller
{
    public function index()
    {
        $post = Post::where('type', 'post')->paginate();
        return view('sitemanager.post.index', compact('post'));
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function form($id = null)
    {
        if(!is_null($id)) {
            if($id){
                $post = Post::find($id);
                session()->flashInput(array_merge($post->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.post.update', $id);
            $method = "PUT";
        }else{
            $action = route('sitemanager.post.store');
            $method = "POST";
        }

        $categories = Category::get();
        $image = File::where([['fileable_type','post'],['fileable_id', $id]])->first();

        return view('sitemanager.post.form', compact('action', 'method', 'categories', 'image'));
    }

    public function store()
    {
        return $this->save();
    }

    public function update($id)
    {
        return $this->save($id);
    }

    public function save($id = null)
    {
        if($id){
            $post = Post::find($id);
        }else{
            $post = new Post;
        }

        $post->category_id = request()->input('category_id');
        $post->title = request()->input('title');
        $post->slug = Str::slug(request()->input('title'));
        $post->tags = request()->input('tags');
        $post->content = request()->input('content');
        $post->type = "post";
        $post->type_id = request()->input('menu_id');
        $post->status = request()->input('status') == 'on' ? 1 : 0;
        $post->published_at = request()->input('published_at')?:today();
        $post->user_id = \Auth::user()->id;

        $post->save();

        if(request()->has('file')){
            $file = request()->file('file');
            $original_name = $file->getClientOriginalName();
            $extension = $file->extension();

            if(empty($extension)){
                $extension = explode('.', $original_name);
                $extension = end($extension);
            }

            $file_name = Str::slug($original_name).'.'.$extension;
            $directory = 'storage/post/';
            $path = $directory.$file_name;
            $file->move($directory,$file_name);

            $input = [
                'name' => $file_name,
                'type' => 'image',
                'fileable_type' => 'post',
                'fileable_id' => $post->id,
                'field'=> 'post',
                'path' => $path
            ];

            $upload = File::create($input);
        }

        $message = sprintf("Data Telah di %s ", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.post.index')->withMessage($message);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post){
            $post->delete();
            return redirect()->route('sitemanager.post.index')->withMessage("Data telah di hapus");
        }
    }
}
