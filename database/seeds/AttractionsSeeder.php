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
            dd($data['Name']);
            //存進資料庫
            AttractionsTest::create(['name' => $data->Name],[]);
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