<?php

use Illuminate\Database\Seeder;

class MapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //map
         $allUser = App\User::all();
         factory(App\Map::class, 5)->make()->each(function ($map) use ($allUser) {
            $map->user_id = $allUser->random()->id;
            $map->save();
        });
    }
}
