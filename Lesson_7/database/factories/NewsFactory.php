<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
//use Faker\Generator as Faker;

$factory->define(News::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->realText(rand(10, 20)),
        'text' => $faker->realText(rand(1000, 2000)),
        'is_private' => false,
        'category_id' => $faker->numberBetween(1,4)
    ];
});
