<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attraction;
use App\AttractionImage;
use Faker\Generator as Faker;

$factory->define(AttractionImage::class, function (Faker $faker) {
    return [
        // 'url'=>$faker->url,
        'image_desc'=>$faker->sentence(6,true),
    ];
});

