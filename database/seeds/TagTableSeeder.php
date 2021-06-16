<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $attractions = App\Attraction::all();
        $tags = factory(App\Tag::class,$attractions->count())->create();
        $tags->each(function($tag) use($attractions){
            $tag->attractions()->attach($attractions->random());
        });
    }
}
