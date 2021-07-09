<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Polling;

class PollingController extends Controller
{
    public function index()
    {
        $polling = Polling::whereNull('parent')->get();
        $polling->each(function($item){
            $item->subitem = Polling::where('parent', $item->id)->get();
        });

        return view('sitemanager.polling.index', compact('polling'));
    }

    public function form($id = null)
    {
        if(!is_null($id)){
            if($id){
                $polling = Polling::find($id);
                session()->flashInput(array_merge($polling->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.polling.update', $id);
            $method = "PUT";
        }else{
            $action = route('sitemanager.polling.store');
            $method = "POST";
        }

        $parent = null;
        if(request()->get('id')){
            $parent = Polling::find(request()->get('id'));
        }

        return view('sitemanager.polling.form', compact('action', 'method', 'parent'));
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function save($id = null)
    {
        if($id){
            $polling = Polling::find($id);
        }else{
            $polling = new Polling;
        }

        $polling->content = request()->input('content');
        $polling->parent = request()->input('parent_id');
        if(!is_null(request()->input('parent_id'))){
            $polling->type = 'answer';
        }

        $polling->status = 1;

        $polling->save();

        $message = sprintf("Data Telah di %s ", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.polling.index')->withMessage($message);
    }

    public function store()
    {
        return $this->save();
    }

    public function update($id)
    {
        return $this->save($id);
    }

    public function destroy($id)
    {
        $polling = Polling::find($id);
        if($polling){
            $polling->delete();
            return redirect()->route('sitemanager.polling.index')->withMessage('Selamat');;
        }
    }

}
