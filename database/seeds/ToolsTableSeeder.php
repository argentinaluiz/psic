<?php

use Illuminate\Database\Seeder;

class ToolsTableSeeder extends Seeder
{
    public function run()
    {
        $psychoanalysts = \App\Models\Painel\Psychoanalyst::all();
        $ranks = \App\Models\Painel\Rank::all();
        $sub_ranks = \App\Models\Painel\SubRank::all();
        $sub_sub_ranks = \App\Models\Painel\SubSubRank::all();
        factory(\App\Models\Painel\Tool::class,20)
            ->create()
            ->each(function (\App\Models\Painel\Tool $model) use ($psychoanalysts, $ranks, $sub_ranks, $sub_sub_ranks ){
                /** @var Illuminate\Support\Collection $psychoanalystCol */
               // $psychoanalystCol = $psychoanalysts->random(10);
               // $model->psychoanalysts()->attach($psychoanalystCol->pluck('id'));

                $toolkit = rand(3,9);

                $psychoanalystCol = $psychoanalysts->random($toolkit);
                $rankCol = $ranks->random($toolkit);
                $sub_rankCol = $sub_ranks->random($toolkit);
                $sub_sub_rankCol = $sub_sub_ranks->random($toolkit);
                foreach (range(1,$toolkit) as $value){
                    $model->toolkits()->create([
                        'rank_id' => $rankCol->get($value-1)->id,
                        'sub_rank_id' => $sub_rankCol->get($value-1)->id,
                        'sub_sub_rank_id' => $sub_sub_rankCol->get($value-1)->id,
                        'psychoanalyst_id' => $psychoanalystCol->get($value-1)->id,
                    ]);
                }
            });
    }
}
