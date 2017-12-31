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

$factory->define(App\Question::class, function (Faker $faker) {

    return [
        'category_id' => 1,
        'title:de' => 'de: ' . $faker->text(15) . '?',
        'options:de' => [0 => "a", 1 => "b", 2 => "c", 3 => "d"],
        'answer:de' => $faker->numberBetween(1,4),
        'title:en' => 'en: '. $faker->text(5) . '?',
        'options:en' => [0 => "a", 1 => "b", 2 => "c", 3 => "d"],
        'answer:en' => $faker->numberBetween(1,4),
    ];
});
