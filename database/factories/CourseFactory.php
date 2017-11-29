<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {

    return [
        'name:de' => 'de: Excel Anfänger', #. $faker->text(15),
        'name:en' => 'en: Excel Beginner', #. $faker->text(15),
        'category_id' => 1,
    ];
});