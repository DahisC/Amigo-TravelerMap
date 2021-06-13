<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$name = [
    '自然',
    '人文',
    '景點',
    '藝術',
    '市集',
    '祭典',
    '親子',
    '音樂',
    '秘境',
    '彩蛋',
];
$factory->define(Tag::class, function (Faker $faker) use ($nameArray) {
    return [
        'name' => $nameArray[array_rand($nameArray, 1)],
        'color' => $faker->hexcolor
    ];
});
