<?php

use Illuminate\Database\Seeder;

class ResearchesTableSeeder extends Seeder
{
    public function run()
    {
        $psychoanalysts = \App\Models\Painel\Psychoanalyst::all();
        factory(\App\Models\Painel\Research::class,50)
            ->create()
            ->each(function (\App\Models\Painel\Research $model) use ($psychoanalysts){
                /** @var Illuminate\Support\Collection $psychoanalystCol */
                $psychoanalystCol = $psychoanalysts->random(10);
                $model->psychoanalysts()->attach($psychoanalystCol->pluck('id'));
            });
    }
}
