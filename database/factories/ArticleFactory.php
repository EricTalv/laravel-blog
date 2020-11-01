<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'excerpt' => $faker->realText(50, 1),
        'body' => $faker->paragraph,
    ];
});
