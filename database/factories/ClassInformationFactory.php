<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\ClassInformation::class, function (Faker $faker) {
    return [
        'date_start' => $faker->date(),
        'date_end' => $faker->date(),
        'name' => $faker->word(10),
        'semester' => rand(1,2),
        'year' => rand(2017,2030),
    ];
});

$factory->define(App\Models\Painel\ClassTest::class, function (Faker $faker) {
    return [
        'date_start' => $faker->dateTimeBetween('now','+1 hour'),
        'date_end' => $faker->dateTimeBetween('now','+1 hour'),
        'name' => $faker->sentence(3),
        'question_type' => rand(1,3),
    ];
});

$factory->define(App\Models\Painel\Question::class, function (Faker $faker) {
    return [
        'question' => "{$faker->sentence(6)}?",
        'point' => $faker->randomFloat(2,1,3)
    ];
});

$factory->define(App\Models\Painel\QuestionChoice::class, function (Faker $faker) {
    return [
        'choice' => $faker->sentence(6)
    ];
});
