<?php

use Illuminate\Database\Seeder;

class ImgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = App\Attraction::all();
        factory(App\AttractionImage::class,5)->make()->each(function($img) use($attr){
            $img->attraction_id = $attr->random()->id;
            $img->save();
        });
    }
}
