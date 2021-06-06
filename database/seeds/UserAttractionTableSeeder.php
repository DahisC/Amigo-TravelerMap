<?php

use Illuminate\Database\Seeder;

class UserAttractionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        $attraction = App\Attraction::all();
        for ($i=0; $i <$attraction->count(); $i++) {
            $users->random()->attractions()->attach($attraction->random());
        };
    }
}
