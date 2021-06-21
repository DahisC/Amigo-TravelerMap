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
        $users = App\User::all();
        factory(App\Map::class, 50)->make()->each(function ($map) use ($users) {
            $map->user_id = $users->random()->id;
            $map->save();
        });
    }
}
