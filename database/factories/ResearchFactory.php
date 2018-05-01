<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\Research::class, function (Faker $faker) {
    return [
        'title' => $faker->word(10),
        'description' => $faker->sentence(3),
        'year' => rand(2017,2030),
        'active' => rand(0, 1),
    ];
});

