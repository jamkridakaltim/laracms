<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as Upload;

class UploadController extends Controller
{
    public function index()
    {
        $upload = Upload::paginate();
        return view('sitemanager.upload.index', compact('upload'));
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
                $upload = Upload::find($id);
                session()->flashInput(array_merge($upload->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.file.update', $id);
            $method = "PUT";
        }else{
            $action = route('sitemanager.file.store');
            $method = "POST";
        }

        // $menu = Menu::whereNull('parent_id')->active()->get();
        // $menu->each(function($item){
        //     $item->subitem = Menu::where('parent_id', $item->id)->active()->get();
        // });

        return view('sitemanager.upload.form', compact('action', 'method'));
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
            $upload = Upload::find($id);
        }else{
            $upload = new Upload;
        }

        // $upload->category_id = request()->input('category_id');
        $menu = Menu::find(request()->input('menu_id'));

        $upload->title = $menu->name;

        $upload->slug = Str::slug(request()->input('title'));
        $upload->tags = request()->input('tags');
        $upload->content = request()->input('content');
        $upload->type = "upload";
        $upload->type_id = request()->input('menu_id');
        $upload->status = request()->input('status') == 'on' ? 1 : 0;
        $upload->published_at = request()->input('published_at')?:today();
        $upload->user_id = \Auth::user()->id;

        $upload->save();

        $message = sprintf("Data Telah di %s", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.upload.index')->withMessage($message);
    }

    public function destroy($id)
    {
        $upload = Upload::find($id);
        if($upload){
            $upload->delete();
            return redirect()->route('sitemanager.upload.index')->withMessage('Data Telah Dihapus');
        }

        return redirect()->route('sitemanager.upload.index')->withError('Data Tidak Ditemukan');

    }
}
