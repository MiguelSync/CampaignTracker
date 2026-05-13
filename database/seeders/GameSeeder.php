<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            [
                'name' => 'Elden Ring',
                'url_image' => 'https://assets-prd.ignimgs.com/2021/06/12/elden-ring-button-03-1623460560664.jpg?crop=1%3A1%2Csmart&format=jpg&auto=webp&quality=80',
            ],
            [
                'name' => 'Valorant',
                'url_image' => 'https://logodix.com/logo/2210577.jpg',
            ],
            [
                'name' => 'Grand Theft Auto V',
                'url_image' => 'https://images.tcdn.com.br/img/img_prod/926345/adesivo_de_parede_grand_theft_auto_5_1773_2_cbbb5675e157160bee4a2bd1aea31cb1_20210816115627.jpeg',
            ],
            [
                'name' => 'Minecraft',
                'url_image' => 'https://images.icon-icons.com/2699/PNG/512/minecraft_logo_icon_168974.png',
            ],
            [
                'name' => 'Counter-Strike 2',
                'url_image' => 'https://cdn.jsdelivr.net/gh/homarr-labs/dashboard-icons/png/counter-strike-2.png',
            ],
        ]);
    }
}
