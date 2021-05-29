<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {

        $menu = Menu::paginate();
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

        return view('sitemanager.menu.form', compact('action', 'method'));
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
        $menu->url = request()->input('url');
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
