<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' => $faker->word,
        'excerpt' => $faker->realText(50, 1),
        'body' => $faker->paragraph,
    ];
});
