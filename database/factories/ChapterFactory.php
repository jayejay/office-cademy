<?php

use Faker\Generator as Faker;

$factory->define(App\Chapter::class, function (Faker $faker) {

    return [
        'chapter' => $faker->text(30),
    ];
});