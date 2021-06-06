<?php

use Illuminate\Database\Seeder;

class AttractionTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = App\Tag::all();
        $attraction = App\Attraction::all();
        for ($i=0; $i <$attraction->count(); $i++) {
            $tags->random()->attractions()->attach($attraction->random());
        }
    }
}
