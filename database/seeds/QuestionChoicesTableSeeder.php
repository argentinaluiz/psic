<?php

use Illuminate\Database\Seeder;

class QuestionChoicesTableSeeder extends Seeder
{
    public function run()
{
    $type_choices = \App\Models\Painel\TypeChoice::all();
    factory(\App\Models\Painel\QuestionChoice::class,30)
        ->create()
        ->each(function (\App\Models\Painel\QuestionChoice $model) use ($type_choices){
            /** @var Illuminate\Support\Collection $type_choicesCol */
            $type_choicesCol = $type_choices->random(10);
            $model->type_choices()->attach($type_choicesCol->pluck('id'));
        });
}
}
