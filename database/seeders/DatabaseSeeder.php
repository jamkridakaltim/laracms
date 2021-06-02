<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $users = [
            [
                'username' => 'super',
                'password' => \Hash::make('remaster'),
                'level' => 'super',
            ],
            [
                'username' => 'admin',
                'password' => \Hash::make('admin'),
                'level' => 'admin',
            ],
        ];

        \App\Models\User::insert($users);

        \App\Models\Menu::create([
            'name' => 'Beranda',
            'slug' => Str::slug('Beranda'),
            'status' => 1,
            'lock' => 1,
        ]);


        $categories = [
            ['name' => 'Berita', 'slug' => Str::slug('Berita')],
            ['name' => 'Artikel', 'slug' => Str::slug('Artikel')],
            ['name' => 'Pegumuman', 'slug' => Str::slug('Pengumuman')],
            ['name' => 'Agenda', 'slug' => Str::slug('Agenda')]
        ];

        \App\Models\Post\Category::insert($categories);
    }
}
