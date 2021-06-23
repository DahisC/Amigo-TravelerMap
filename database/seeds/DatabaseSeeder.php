<?php

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
            TagTableSeeder::class,
            AmigoSeeder::class,
            UsersTableSeeder::class,
            MapTableSeeder::class,
            AttractionsTableSeeder::class,
            AttractionsConcertSeeder::class,
            AttractionsExhibitionSeeder::class,
            AttractionsFestivalSeeder::class,
            MapAttractionTableSeeder::class,
            UserAttractionTableSeeder::class,
        ]);
    }
}
