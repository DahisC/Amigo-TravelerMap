<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Map;
use App\User;
use Faker\Generator as Faker;

$factory->define(Map::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        // 'user_id'=>User::find(1),
    ];
});

