<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function menus()
    {
        $menu = Menu::whereNull('parent_id')->get();

        $menu->each(function($item){
            $item->submenu = Menu::where('parent_id', $item->id)->get();
        });

        return $menu;
    }
}
