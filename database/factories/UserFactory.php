<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'api_token' => Str::random(80),
        'remember_token' => Str::random(10),
        'avatar' => '/images/avatar/avatar-traveler.png'
    ];
});



foreach (['Admin', 'Guider', 'Traveler'] as $role) {
    $factory->state(User::class, $role, function () use ($role) {
        return [
            'name' => $role,
            'email' => "$role@gmail.com",
            'role' => $role,
            'password' => bcrypt('a'),
            'avatar' => '/images/avatar/avatar-' . strtolower($role) . '.png'
        ];
    });
}

// $factory->state(User::class, 'admin', function (Faker $faker) {
//     return [
//         'name' => 'Admin',
//         'email' => 'Admin@gmail.com',
//         'role' => 'Admin',
//         'password' => bcrypt('a')
//     ];
// });
// $factory->state(User::class, 'Trader', function (Faker $faker) {
//     return [
//         'name' => 'Trader',
//         'email' => 'Trader@gmail.com',
//         'role' => 'Trader',
//         'password' => bcrypt('a')
//     ];
// });
// $factory->state(User::class, 'Tourist', function (Faker $faker) {
//     return [
//         'name' => 'Traveler',
//         'email' => 'Traveler@gmail.com',
//         'role' => 'Traveler',
//         'password' => bcrypt('a')
//     ];
// });
