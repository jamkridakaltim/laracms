<?php

namespace App\Http\Controllers\Manager\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Str;

class FotoController extends Controller
{
    public function index()
    {
        $gallery = Gallery::image()->where('featured', 1)->paginate();
        return view('sitemanager.gallery.foto.index', compact('gallery'));
    }

    public function show($slug)
    {
        $gallery = Gallery::image()->where('slug',$slug)->get();
        $sub = $slug;
        return view('sitemanager.gallery.foto.show', compact('gallery', 'sub'));
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
        if(!is_null($id)){
            if($id){
                $gallery = Gallery::find($id);
                session()->flashInput(array_merge($gallery->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.foto.update', [$id, 'featured' => request()->get('featured')]);
            $method = 'PUT';
        }else{
            $action = route('sitemanager.foto.store', ['featured' => request()->get('featured')]);
            $method = 'POST';
        }

        $foto = null;
        if(request()->get('featured') == 0){
            $foto = Gallery::where('slug', request()->get('slug'))->first();
        }

        return view('sitemanager.gallery.foto.form', compact('action', 'method', 'foto'));
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
            $gallery = Gallery::find($id);
        }else{
            $gallery = new Gallery;
        }

        if(request()->has('file')){

            $file = request()->file('file');
            $original_name = $file->getClientOriginalName();
            $extension = $file->extension();

            if(empty($extension)){
                $extension = explode('.', $original_name);
                $extension = end($extension);
            }

            $file_name = Str::slug($original_name).'.'.$extension;
            $directory = 'storage/'.(request()->input('type')?:'foto').'/';
            $path = $directory.$file_name;
            $file->move($directory,$file_name);
            $gallery->link  = $path;
        }

        $gallery->type = 'image';
        $gallery->caption = request()->input('caption');
        $gallery->slug = Str::slug(request()->input('caption'));
        $gallery->description = request()->input('description');

        $gallery->featured = request()->get('featured');

        $gallery->save();

        $message = sprintf("Data Telah di %s", $id ? 'simpan' : 'tambahkan');

        if(request()->get('featured') == 1){
            return redirect()->route('sitemanager.foto.index')->withMessage($message);
        }

        return redirect()->route('sitemanager.foto.show', $gallery->slug)->withMessage($message);
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if($id){
            unlink($gallery->link);
            $gallery->delete();

        if(request()->get('featured') == 1){
            return redirect()->route('sitemanager.foto.index')->withMessage('Data Telah Dihapus');
        }
        return redirect()->route('sitemanager.foto.show', $gallery->slug)->withMessage('Data Telah Dihapus');

        }
    }
}
