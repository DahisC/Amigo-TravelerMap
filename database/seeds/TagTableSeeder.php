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
        foreach($nameArray as $array){
            Tag::firstOrCreate(
                ['name' => $array],
                factory(App\Tag::class)->raw(['name' => $array])
            );
        };
    }
}
