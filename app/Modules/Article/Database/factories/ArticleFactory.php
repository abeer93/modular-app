<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\Article\Models\Article;
use App\User;
use Faker\Generator;

$factory->define(Article::class, function (Generator $faker) {
    return [
        'title'       => $faker->sentence,
        'content'     => $faker->paragraph
    ];
});
