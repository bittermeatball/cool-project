<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'), // secret
        'avatar' => $faker->imageUrl($width = 400, $height = 400),
        'bgimage' => $faker->imageUrl($width = 600, $height = 480),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

