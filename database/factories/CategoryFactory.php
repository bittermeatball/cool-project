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

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->word,
        'slug' => slug($faker->word),
        'parent_id' => $faker->numberBetween($min = 0, $max = 10),
        'keywords' => $faker->word,
        'description' => $faker->sentence($nbWords = 1, $variableNbWords = true),
    ];
});

