<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as Upload;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function index()
    {
        $upload = Upload::whereNull('fileable_type')->paginate();
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

        $type = [
            'foto',
            'banner-main',
            'banner-top',
            'banner-middle',
            'banner-bottom',
            // 'footer',
        ];

        return view('sitemanager.upload.form', compact('action', 'method', 'type'));
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
            if(request()->has('file')){
                unlink(data_get($upload, 'path'));
            }
        }else{
            $upload = new Upload;
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
            $upload->name  = $file_name;
            $upload->path  = $path;
        }

        // $upload->field = 'post';

        $upload->type  = request()->input('type')?:'foto';
        $upload->save();

        $message = sprintf("Data Telah di %s", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.file.index')->withMessage($message);
    }

    public function destroy($id)
    {
        $upload = Upload::find($id);
        if($upload){
            unlink($upload->path);
            $upload->delete();
            if(request()->get('post')){
                return redirect()->back()->withMessage('Data Telah Dihapus');
            }
            return redirect()->route('sitemanager.file.index')->withMessage('Data Telah Dihapus');
        }

        return redirect()->back()->withError('Data Tidak Ditemukan');

    }
}
