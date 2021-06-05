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
        //自訂user
        factory(App\User::class)->states('DahisC')->create();
        //假資料user
        factory(App\User::class, 5)->create();
    }
}
