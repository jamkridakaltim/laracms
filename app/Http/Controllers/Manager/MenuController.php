<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {

        $menu = Menu::whereNull('parent_id')->paginate();
        $menu->each(function($item){
            $item->subitem = Menu::where('parent_id', $item->id)->get();
        });
        return view('sitemanager.menu.index', compact('menu'));
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
                $menu = Menu::find($id);
                session()->flashInput(array_merge($menu->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.menu.update', $id);
            $method = "PUT";
        }else{
            $action = route('sitemanager.menu.store');
            $method = 'POST';
        }

        $parent = null;
        if(request()->get('id')){
            $parent = Menu::find(request()->get('id'));
        }

        return view('sitemanager.menu.form', compact('action', 'method', 'parent'));
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
            $menu = Menu::find($id);
        }else{
            $menu = new Menu;
        }

        $menu->name = request()->input('name');
        $menu->parent_id = request()->input('parent_id');

        if(!is_null(request()->input('url'))){
            $menu->url = url(Str::slug(request()->input('url')));
        }else{
            $menu->url = url(Str::slug(request()->input('name')));
        }

        $menu->save();

        return redirect()->route('sitemanager.menu.index')->withMessage('Selamat');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if($menu){
            $menu->delete();
            return redirect()->route('sitemanager.menu.index')->withMessage('Selamat');;
        }
    }
}
