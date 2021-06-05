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
        //admin
        factory(App\User::class)->states('admin')->create();
        //Trader
        factory(App\User::class)->states('Trader')->create();
        //Tourist
        factory(App\User::class)->states('Tourist')->create();
        //假資料user
        factory(App\User::class, 5)->create();


    }
}
