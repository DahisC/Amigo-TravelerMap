<?php

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
        $attraction = App\Attraction::all();
        $maps = App\Map::all();
        for ($i=0; $i <$attraction->count(); $i++) {
            $maps->random()->attractions()->attach($attraction->random());
        }
    }
}
