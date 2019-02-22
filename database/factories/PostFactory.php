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

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'post_title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'post_description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'post_thumbnail' => $faker->imageUrl($width = 600, $height = 480),
        'post_content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
    ];
});

