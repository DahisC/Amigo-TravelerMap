<?php

use App\AttractionsTest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(public_path('attraction.json')); //我是string
        //php函式 json_encode ，資料存入mysql
        $json = json_decode($jsonFile,true); //我是array，

        // 整理資料
        $json_ = $json['XML_Head']['Infos']['Info'];
        foreach ($json_ as $data){
            // dd($data['Name']);
            //存進資料庫
            DB::table('attractions_tests')->
                create(['name' =>  "ce",
                'tel' =>  "123",
                'description' => "123",
                'ticket_info' => "123",
                'traffic_info' => "123",
                'parking_info' => "123",

                // 'name' => $data->Name,
                // 'tel' => $data->tel,
                // 'description' => $data->description,
                // 'ticket_info' => $data->ticket_info,
                // 'traffic_info' => $data->traffic_info,
                // 'parking_info' => $data->parking_info,
            
            ]);
        }

    }
}

//$aa = print_r($json,true);   //我是string
// $bb =gettype($aa);
// DB::insert('AttractionsTest', ['field' => $data]); 
//Print data
// echo $prettyData;
// dd($prettyData['Name']);


// $cc =$data[$data->Id];
// dd($data->key());
// AttractionsTest::create($data);