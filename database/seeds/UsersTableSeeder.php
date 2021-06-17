<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        factory(App\User::class)->states('Admin')->create();
        // Guider
        factory(App\User::class)->states('Guider')->create();
        // Traveler
        factory(App\User::class)->states('Traveler')->create();
        // Fake users
        factory(App\User::class, 5)->create();


    }
}
