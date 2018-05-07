<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\SubRank::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
