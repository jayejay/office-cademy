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
        'title' => $faker->text(30),
        'body' => $faker->text(250),
        'active' => $faker->boolean,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => 1,
    ];
});
