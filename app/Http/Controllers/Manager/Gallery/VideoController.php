<?php

namespace App\Http\Controllers\Manager\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        $gallery = Gallery::video()->paginate(9);
        return view('sitemanager.gallery.video.index', compact('gallery'));
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

            $action = route('sitemanager.video.update', [$id, 'featured' => request()->get('featured')]);
            $method = 'PUT';
        }else{
            $action = route('sitemanager.video.store', ['featured' => request()->get('featured')]);
            $method = 'POST';
        }

        $foto = null;
        if(request()->get('featured') == 0){
            $foto = Gallery::where('slug', request()->get('slug'))->first();
        }

        return view('sitemanager.gallery.video.form', compact('action', 'method', 'foto'));
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

        $gallery->type = 'video';
        $gallery->caption = request()->input('caption');
        $gallery->link = str_replace('https://www.youtube.com/watch?v=','',request()->input('link'));
        $gallery->slug = Str::slug(request()->input('caption'));
        $gallery->description = request()->input('description');

        $gallery->featured = 0;

        $gallery->save();

        $message = sprintf("Data Telah di %s", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.video.index')->withMessage($message);

    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if($id){
            unlink($gallery->link);
            $gallery->delete();

        if(request()->get('featured') == 1){
            return redirect()->route('sitemanager.video.index')->withMessage('Data Telah Dihapus');
        }
        return redirect()->route('sitemanager.video.show', $gallery->slug)->withMessage('Data Telah Dihapus');

        }
    }
}
