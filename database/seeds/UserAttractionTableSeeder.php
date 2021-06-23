<?php

use App\User;
use App\Attraction;
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
        $users = User::all();
        foreach ($users as $user) {
            if ($user->id === 1) continue;
            $user->attractions()->attach(Attraction::inRandomOrder()->limit(3)->get());
        }
    }
}
