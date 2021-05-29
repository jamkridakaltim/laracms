<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function menus()
    {
        return Menu::get();
    }
}
