<?php

use Faker\Generator as Faker;

$factory->define(App\Chapter::class, function (Faker $faker) {

    return [
        'name:de' => 'de: ' . $faker->text(30),
        'name:en' => 'en: ' . $faker->text(30),
        'course_id' => 1
    ];
});