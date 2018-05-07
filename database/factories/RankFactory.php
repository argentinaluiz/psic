<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\Rank::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
