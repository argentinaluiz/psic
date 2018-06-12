<?php

use Illuminate\Database\Seeder;

class ClassOptingsTableSeeder extends Seeder
{
    public function run()
    {
        $question_choices = \App\Models\Painel\QuestionChoice::all();
        factory(\App\Models\Painel\TypeChoice::class,50)
            ->create()
            ->each(function(\App\Models\Painel\TypeChoice $model) use($question_choices){
                
                $opting = rand(3,6);

                $question_choicesCol = $question_choices->random($opting);
                foreach (range(1,$opting) as $value){
                    $model->optings()->create([
                        'question_choice_id' => $question_choicesCol->get($value-1)->id,
                    ]);
                }
         });
    }
}
