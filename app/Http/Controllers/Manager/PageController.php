<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post\Post as Page;
use App\Models\Menu;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::where('type', 'page')->paginate();
        return view('sitemanager.page.index', compact('page'));
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
                $page = Page::find($id);
                session()->flashInput(array_merge($page->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.page.update', $id);
            $method = "PUT";
        }else{
            $action = route('sitemanager.page.store');
            $method = "POST";
        }

        $menu = Menu::whereNull('parent_id')->active()->unlock()->get();

        $menu->each(function($item){
            $item->subitem = Menu::where('parent_id', $item->id)->active()->unlock()->get();
        });

        return view('sitemanager.page.form', compact('action', 'method', 'menu'));
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
            $page = Page::find($id);
        }else{
            $page = new Page;
        }

        // $page->category_id = request()->input('category_id');
        $menu = Menu::find(request()->input('menu_id'));

        $page->title = $menu->name;

        $page->slug = Str::slug(request()->input('title'));
        $page->tags = request()->input('tags');
        $page->content = request()->input('content');
        $page->type = "page";
        $page->type_id = request()->input('menu_id');
        $page->status = request()->input('status') == 'on' ? 1 : 0;
        $page->published_at = request()->input('published_at')?:today();
        $page->user_id = \Auth::user()->id;

        $page->save();

        $message = sprintf("Data Telah di %s", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.page.index')->withMessage($message);
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        if($page){
            $page->delete();
            return redirect()->route('sitemanager.page.index')->withMessage('Data Telah Dihapus');
        }

        return redirect()->route('sitemanager.page.index')->withError('Data Tidak Ditemukan');

    }
}
