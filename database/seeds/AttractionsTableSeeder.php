<?php


use App\Tag;
use App\Attraction;
use App\AttractionImage;
use App\AttractionOpentime;
use App\AttractionPosition;
use App\AttractionTag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AttractionsTableSeeder extends Seeder
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
        foreach ($attractions as $a) {
            $attraction = Attraction::create([
                'name' => $a['Name'],
                'website' => $a['Website'],
                'tel' => $a['Tel'],
                'description' => $a['Description'] ?? '',
                'ticket_info' => $a['Ticketinfo'] ?? '',
                'traffic_info' =>  $a['Travellinginfo'] ?? '',
                'parking_info' =>  $a['Parkinginfo'] ?? '',
                'user_id' => '1',
            ]);

            AttractionPosition::create([
                'country' => '台灣',
                'region' => $a['Region'] ?? '',
                'town' => $a['Town'] ?? '',
                'address' => $a['Add'] ?? '',
                'px' => $a['Px'] ?? '',
                'py' => $a['Py'] ?? '',
                'attraction_id' => $attraction->id
            ]);


            for ($i = 1; $i <= 3; $i++) {
                $image_url = $a["Picture$i"];
                $image_desc = $a["Picdescribe$i"];
                if (empty($image_url)) {
                    break;
                };
                AttractionImage::create([
                    'url' => $image_url,
                    'image_desc' => $image_desc ?? '',
                    'attraction_id' => $attraction->id
                ]);
            }

            if (!empty($a['Keyword'])) {
                $tags = preg_split("/[、|,|，]+/u", $a['Keyword']);
                foreach ($tags as $tag) {
                    $tag = str_replace(' ', '', $tag); // 解決 API 中部份 tag 會有空白的問題
                    $attraction_tag = Tag::firstOrCreate(['name' => $tag], factory(App\Tag::class)->raw(['name' => $tag]));
                    $attraction->tags()->attach($attraction_tag);
                }
            }
        }
    }
}
