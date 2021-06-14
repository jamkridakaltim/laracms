<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\File;

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

    public function banners(Type $var = null)
    {
        return File::where('type', 'banner')->get();
    }
}
