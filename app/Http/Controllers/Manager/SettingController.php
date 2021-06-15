<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::paginate();

        return view('sitemanager.setting.index', compact('setting'));
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($key)
    {
        return $this->form($key);
    }

    public function form($key = null)
    {
        if(!is_null($key)){
            if($key){
                $setting = Setting::where('key',$key)->first();
                session()->flashInput(array_merge($setting->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.setting.update', $key);
            $method = 'PUT';
        }else{
            $action = route('sitemanager.setting.store');
            $method = 'POST';
        }

        return view('sitemanager.setting.form', compact('action', 'method'));
    }

    public function store()
    {
        return $this->save();
    }

    public function update($key)
    {
        return $this->save($key);
    }

    public function save($key = null)
    {

        $input = [
            'key' => request()->input('key'),
            'value' => request()->input('value')
        ];

        if($key){
            $setting = Setting::where('key', $key)->update($input);
        }else{
            $setting = Setting::create($input);
        }

        $message = sprintf("Data Telah di %s ", $key ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.setting.index')->withMessage($message);
    }

    public function destroy($key)
    {
        $setting = Setting::where('key', $key);
        $setting->delete();
        return redirect()->route('sitemanager.setting.index')->withMessage('Data Telah Dihapus');
    }
}
