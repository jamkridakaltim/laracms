<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Post\Category;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();
        return view('sitemanager.post.category.index', compact('categories'));
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
                $category = Category::find($id);
                session()->flashInput(array_merge($category->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.post-category.update', $id);
            $method = "PUT";
        }else{
            $action = route('sitemanager.post-category.store');
            $method = "POST";
        }

        return view('sitemanager.post.category.form', compact('action', 'method'));
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
            $category = Category::find($id);
        }else{
            $category = new Category;
        }

        $category->name = request()->input('name');
        $category->slug = Str::slug(request()->input('name'));
        $category->status = request()->input('status') == 'on' ? 1 : 0;

        $category->save();

        $message = sprintf("Data Telah di %s ", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.post-category.index')->withMessage($message);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($id){
            $category->delete();
            return redirect()->route("sitemanager.post-category.index")->withMessage("Data Telah dihapus");
        }
    }
}
