<?php

use App\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            TagTableSeeder::class,
            AttractionsTableSeeder::class,
            ImgTableSeeder::class,
            ]);
    }
}
