<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        $link = Link::paginate();
        return view('sitemanager.link.index', compact('link'));
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
                $link = Link::find($id);
                session()->flashInput(array_merge($link->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.link.update', $id);
            $method = 'PUT';
        }else{
            $action = route('sitemanager.link.store');
            $method = 'POST';
        }

        return view('sitemanager.link.form', compact('action','method'));
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
            $link = Link::find($id);
        }else{
            $link = new Link;
        }

        $link->name = request()->input('name');
        $link->link = request()->input('link');
        $link->save();

        $message = sprintf('Data Telah Di%s', $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.link.index')->withMessage($message);
    }
}
