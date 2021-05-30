<?php


use App\Attraction;
use App\AttractionOpentime;
use App\AttractionPosition;
use Illuminate\Database\Seeder;

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
            Attraction::create([
                'name' => $a['Name'],
                'website' => $a['Website'],
                'tel' => $a['Tel'],
                'description' => $a['Description'] ?? '',
                'ticket_info' => $a['Ticketinfo'] ?? '',
                'traffic_info' =>  $a['Travellinginfo'] ?? '',
                'parking_info' =>  $a['Parkinginfo'] ?? '',
                'user_id' => '1',
                'position_id' => AttractionPosition::create([
                    'address' => $a['Add'] ?? '',
                    'px' => $a['Px'] ?? '',
                    'py' => $a['Py'] ?? '',
                    'country' => '台灣',
                    'region' => $a['Region'] ?? '',
                    'town' => $a['Town'] ?? ''
                ])->id,
                // 'opentime_id' => '3'
            ]);
            // if ($a['Name'] == '台灣金屬創意館') {
            //     break;    /* You could also write 'break 1;' here. */
            // };
        }
    }
}
