<?php

use Illuminate\Database\Seeder;
use App\Models\Painel\Rank;


class RanksTableSeeder extends Seeder
{
    public function run()
    {
        //factory(\App\Models\Painel\Rank::class,10)->create();

        $rank1 = Rank::firstOrCreate([
            'name' =>'Contos',
        ]);
        $rank2 = Rank::firstOrCreate([
            'name' =>'Dinâmicas',
        ]);
        $rank3 = Rank::firstOrCreate([
            'name' =>'Dinâmicas (individuação)',
        ]);
        $rank4 = Rank::firstOrCreate([
            'name' =>'Frases',
        ]);
        $rank5 = Rank::firstOrCreate([
            'name' =>'Videos',
        ]);
        $rank6 = Rank::firstOrCreate([
            'name' =>'Metáforas',
        ]);
        $rank7 = Rank::firstOrCreate([
            'name' =>'Literatura Indicada',
        ]);
        $rank8 = Rank::firstOrCreate([
            'name' =>'Artigos',
        ]);
        $rank9 = Rank::firstOrCreate([
            'name' =>'Músicas',
        ]);
        $rank10 = Rank::firstOrCreate([
            'name' =>'Jogos',
        ]);
    }
}
