<?php

use Faker\Generator as Faker;

$factory->define(App\Language::class, function (Faker $faker) {

    return [
        'language' => $faker->text(15),
    ];
});