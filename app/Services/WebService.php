<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\File;
use App\Models\Setting;

class WebService
{
    public function menus()
    {
        $menu = Menu::whereNull('parent_id')->where('status', 1)->get();

        $menu->each(function($item){
            $item->submenu = Menu::where('parent_id', $item->id)->where('status', 1)->get();
        });

        return $menu;
    }

    public function banners()
    {
        return File::where('type', 'banner-main')->get();
    }

    public function banner($type = null)
    {
        return File::where('type', '=', $type);
    }

    public function titlePage()
    {
        $setting = Setting::where('key', 'title_page');
        return $setting->value('value') ?: 'My Website';
    }
    public function socialMedia($type)
    {
        $setting = Setting::where('key', $type);
        return $setting->value('value');
    }
}
