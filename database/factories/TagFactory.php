<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'color'=>$faker->hexcolor
    ];
});

$factory->state(Tag::class, 'Daniel' ,function (Faker $faker){
    return[
        'name'=>$faker->name,
        'color'=>'#ffffff'
    ];
});
