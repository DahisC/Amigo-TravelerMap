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
            UsersTableSeeder::class,
            MapTableSeeder::class,
            TagTableSeeder::class,
            AttractionsTableSeeder::class,
            AttractionsConcertSeeder::class,
            AttractionsExhibitionSeeder::class,
            AttractionsFestivalSeeder::class,
            MapAttractionTableSeeder::class,
            UserAttractionTableSeeder::class,
            AmigoSeeder::class
        ]);
    }
}
