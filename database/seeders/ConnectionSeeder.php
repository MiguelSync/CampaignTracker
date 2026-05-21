<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('connections')->insert([
            [
                'title' => 'Discord',
                'url_image' => 'https://assets.mofoprod.net/network/images/discord.original_O7AzcAH.jpg',
            ],
            [
                'title' => 'Steam',
                'url_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpq0amk5wxbbRYnevOt1JYVIcDinEXFVcEnA&s',
            ]
        ]);
    }
}
