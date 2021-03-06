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
                'lng' => $a['Px'] ?? '',
                'lat' => $a['Py'] ?? '',
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

            // $randomTags = Tag::get()->random(2);
            $tag = App\Tag::where('name', '景點')->get()->first();
            $attraction->tags()->attach($tag);
        }
    }
}
