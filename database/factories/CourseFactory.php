<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {

    return [
        'course' => $faker->text(30),
        'category_id' => 1
    ];
});