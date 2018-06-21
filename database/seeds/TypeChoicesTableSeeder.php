<?php

use Illuminate\Database\Seeder;

class TypeChoicesTableSeeder extends Seeder
{

    public function run()
    {
        //factory(\App\Models\Painel\TypeChoice::class,50)->create();
        $list_choices = \App\Models\Painel\ListChoice::all();
        factory(\App\Models\Painel\TypeChoice::class,20)
            ->create()
            ->each(function(\App\Models\Painel\TypeChoice $model) use($list_choices){
                
                $choosing = rand(3,6);

                $list_choicesCol = $list_choices->random($choosing);
                foreach (range(1,$choosing) as $value){
                    $model->choosings()->create([
                        'list_choice_id' => $list_choicesCol->get($value-1)->id,
                    ]);
                }
            });
    }
}
