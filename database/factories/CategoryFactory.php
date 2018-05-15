<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(20),
        'slug' => $faker->word,
    ];
});
