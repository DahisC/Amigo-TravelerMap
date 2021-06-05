<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Optional;

class AttractionImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $jsonFile = file_get_contents(public_path('TaiwanAttractions.json'));
        $json = json_decode($jsonFile, true);
        // dd(array_keys($json['XML_Head']['Infos']['Info']));
        $attractions = $json['XML_Head']['Infos']['Info'];

        $all = [];
        foreach ($attractions as $a) {
            array_push($all, $a['Picture1']);
        }
        $attr = App\Attraction::all();
        factory(App\AttractionImage::class, 5191)->make()->each(function ($img) use ($attr, $all) {
            $img->attraction_id = $attr->random()->id;
            foreach ($all as $url) {
                $img->url = $url;
                //用for跑看看
                // $path = Storage::disk('myfile')->putFile('AttractionImg', $url);
                // $img->url = Storage::disk('myfile')->url($path);
                // dd($img->url);
            };
            $img->save();
        });
    }
}
