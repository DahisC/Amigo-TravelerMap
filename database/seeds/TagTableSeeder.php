<?php

use App\Tag;
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
        $nameArray = [
            '自然',
            '人文',
            '景點',
            '藝術',
            '市集',
            '祭典',
            '親子',
            '音樂',
            '秘境',
            '彩蛋',
        ];
        $attractions = App\Attraction::all();
        foreach($nameArray as $array){
            $name_random = $array;
            $tags = Tag::firstOrCreate(
                ['name' => $name_random],
                factory(App\Tag::class)->raw(['name' => $name_random])
            );
        };
        $attractions->each(function($attraction) use($tags){
            $attraction->tags()->attach($tags);
        });
    }
}
