<?php

use App\Attraction;
use App\AttractionTime;
use App\AttractionImage;
use App\AttractionPosition;
use Illuminate\Database\Seeder;

class AttractionsFestivalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_one =App\Tag::where('name','祭典')->get()->first();
        $tag_two =App\Tag::where('name','人文')->get()->first();
        $jsonFile = file_get_contents(public_path('Festival.json'));
        $attractions = json_decode($jsonFile, true);
        foreach ($attractions as $a) {

            $attraction = Attraction::create([
                'name' => $a['title'],
                'website' => $a['webSales'] ?? '',
                'tel' => '',
                'description' => $a['descriptionFilterHtml'] ?? '',
                'ticket_info' => $a['discountInfo'] ?? '',
                'traffic_info' => $a['comment'] ?? '',
                'parking_info' =>  '',
                'user_id' => '1',
            ]);

            $show = preg_split("/\p{Han}{1,2}(縣|市)/u", $a['showInfo'][0]['location'],3);
            AttractionPosition::create([
                'country' => '台灣',
                'region' =>  $show[0] ?? '',
                'town' => $show[1] ?? '',
                'address' => $a['showInfo'][0]['location'],
                'lat' => $a['showInfo'][0]['latitude'] ?? '25.017525',
                'lng' =>  $a['showInfo'][0]['longitude'] ?? '121.533162',
                'attraction_id' => $attraction->id
            ]);

            if (!empty($a['startDate'])||!empty($a['endDate'])) {
                $start_times = preg_split("/\//m", $a['startDate']);
                $end_times = preg_split("/\//m", $a['endDate']);

                AttractionTime::create([
                    'startDate' => $a['startDate'],
                    'start_year' => $start_times[0],
                    'start_month' => $start_times[1],
                    'start_day' => $start_times[2],
                    'endDate' => $a['endDate'],
                    'end_year' => $end_times[0],
                    'end_month' => $end_times[1],
                    'end_day' => $end_times[2],
                    'attraction_id' => $attraction->id
                ]);
            };

            AttractionImage::create([
                'url' => $a['imageUrl'] ?? '',
                'image_desc' =>  '',
                'attraction_id' => $attraction->id
            ]);
            //tags關聯
            $attraction->tags()->attach($tag_one);
            $attraction->tags()->attach($tag_two);
        };
    }
}
