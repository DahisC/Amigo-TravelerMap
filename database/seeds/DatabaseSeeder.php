<?php

use App\Attraction;
use App\Map;
use App\Tag;
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
        $this->call([
            UsersTableSeeder::class,
            MapTableSeeder::class,
            TagTableSeeder::class,
            AttractionsTableSeeder::class,
            AttractionsExhibitionTableSeeder::class,
            AttractionsConcertTableSeeder::class,
            AttractionsFestivalTableSeeder::class,
            MapAttractionTableSeeder::class,
            UserAttractionTableSeeder::class,
        ]);
    }
}
