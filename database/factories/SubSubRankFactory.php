<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\SubSubRank::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
