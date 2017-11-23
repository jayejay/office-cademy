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
$autoIncrement = autoIncrement();

$factory->define(App\Post::class, function (Faker $faker) use ($autoIncrement) {
    $autoIncrement->next();
    return [
        'title:de' => "Deutscher Titel {$autoIncrement->current()}", #$faker->text(30),
        'body:de' => $faker->realText(250),
        'title:en' => "English Title {$autoIncrement->current()}",#$faker->text(30),
        'body:en' => $faker->realText(250),
        'active' => $faker->boolean,
        'user_id' => random_int(1,2),
//        'user_id' => function () {
//            return factory(App\User::class)->create()->id;
//        },
        'published_at' => $faker->dateTime(),
        'category_id' => 1,
        'course_id' => 1,
        'chapter_id' => function(){
            return factory(App\Chapter::class)->create()->id;
        }
    ];
});

function autoIncrement()
{
    for ($i = 0; $i <= 10; $i++) {
        yield $i;
    }
}
