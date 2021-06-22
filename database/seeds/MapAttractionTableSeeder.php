<?php

use App\User;
use App\Attraction;
use Illuminate\Database\Seeder;

class MapAttractionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = App\Map::all();
        foreach ($maps as $map) {
            $map->attractions()->attach(Attraction::inRandomOrder()->limit($map->user_id === 1 ? 0 : 3)->get());
        }
    }
}
