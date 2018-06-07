<?php

use Illuminate\Database\Seeder;

class ResearchesTableSeeder extends Seeder
{
    public function run()
    {
        $psychoanalysts = \App\Models\Painel\Psychoanalyst::all();
        $categories = \App\Models\Painel\Category::all();
        factory(\App\Models\Painel\Research::class,50)
            ->create()
            ->each(function (\App\Models\Painel\Research $model) use ($psychoanalysts, $categories){
                /** @var Illuminate\Support\Collection $psychoanalystCol */

                $set = rand(3,9);

                $psychoanalystCol = $psychoanalysts->random($set);
                $categoryCol = $categories->random($set);
                foreach (range(1,$set) as $value){
                    $model->sets()->create([
                        'category_id' => $categoryCol->get($value-1)->id,
                        'psychoanalyst_id' => $psychoanalystCol->get($value-1)->id,
                    ]);
                }
                
                /* $psychoanalystCol = $psychoanalysts->random(10);
                $model->psychoanalysts()->attach($psychoanalystCol->pluck('id'));



                $categoryCol = $categories->random(3);
                $model->categories()->attach($categoryCol->pluck('id'));*/
            });
    }
}
