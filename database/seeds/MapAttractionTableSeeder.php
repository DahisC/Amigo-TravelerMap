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
            if ($map->id === 1) continue;
            $map->attractions()->attach(Attraction::inRandomOrder()->limit(3)->get());
        }
    }
}
