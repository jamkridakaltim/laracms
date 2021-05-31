<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'username' => 'admin',
            'password' => \Hash::make('admin'),
        ]);

        \App\Models\Menu::create([
            'name' => 'Beranda',
            'link' => "",
            'status' => 1,
            'lock' => 1,
        ]);
    }
}
