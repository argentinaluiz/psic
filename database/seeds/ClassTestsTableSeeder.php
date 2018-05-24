<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use App\Models\Painel\ClassTest;
use App\Models\Painel\Question;

class ClassTestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classMeetings = \App\Models\Painel\ClassMeeting::all();
        $psychDefault = \App\Models\Painel\Psychoanalyst::find(1);
        $self = $this;
        /**
         * Criando questões para o psicanalista de testes psych@user.com
         */
        factory(ClassTest::class,30)
            ->make()
            ->each(function (ClassTest $model) use($classMeetings,$psychDefault,$self){
                $classMeeting = $classMeetings
                    ->where('psychoanalyst_id',$psychDefault->id)
                    ->random();
                $model->classMeeting()->associate($classMeeting);
                $model->save();
                $self->createQuestions($model);
            });

        factory(ClassTest::class,100)
            ->make()
            ->each(function (ClassTest $model) use($classMeetings,$self){
                if(!$model->class_meeting_id){
                    $classMeeting = $classMeetings->random();
                    $model->classMeeting()->associate($classMeeting);
                    $model->save();
                    $self->createQuestions($model);
                }
            });
    }

    protected function createQuestions(ClassTest $classTest){
        $questions = factory(Question::class, 4)->create([
            'class_test_id' => $classTest->id
        ]);

        $this->createChoices($questions);
    }

    protected function createChoices(Collection $questions){
        $questions->each(function(Question $question){
           $choices = factory(\App\Models\Painel\QuestionChoice::class, 4)->create([
               'question_id' => $question->id
           ]);
           $choiceFirst = $choices->first();
           $choiceFirst->true = true;
           $choiceFirst->save();
        });
    }
}
