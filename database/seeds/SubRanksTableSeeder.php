<?php

use Illuminate\Database\Seeder;
use App\Models\Painel\SubRank;


class SubRanksTableSeeder extends Seeder
{
    public function run()
    {
       // factory(\App\Models\Painel\SubRank::class,10)->create();

    	$conto1 = SubRank::firstOrCreate([
            'name' =>'Infantis',
            'rank_id' =>'1',
            'parent_id' => null
        ]);
        $conto2 = SubRank::firstOrCreate([
            'name' =>'Diversos',
            'rank_id' =>'1',
            'parent_id' => null
        ]);
        $dinamica1 = SubRank::firstOrCreate([
            'name' =>'Abandono',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica2 = SubRank::firstOrCreate([
            'name' =>'Autoconfiança',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica3 = SubRank::firstOrCreate([
            'name' =>'Autoestima',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica4 = SubRank::firstOrCreate([
            'name' =>'Dados Iniciais',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica5 = SubRank::firstOrCreate([
            'name' =>'Desejos e Sonhos',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica6 = SubRank::firstOrCreate([
            'name' =>'Empatia',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica7 = SubRank::firstOrCreate([
            'name' =>'Ficha Atual',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica8 = SubRank::firstOrCreate([
            'name' =>'Fracasso',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica9 = SubRank::firstOrCreate([
            'name' =>'Gestão de Conflitos',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica10 = SubRank::firstOrCreate([
            'name' =>'Traumas',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica11 = SubRank::firstOrCreate([
            'name' =>'Valores',
            'rank_id' =>'2',
            'parent_id' => null
        ]);
        $dinamica12 = SubRank::firstOrCreate([
            'name' =>'Flexibilidade',
            'rank_id' =>'3',
            'parent_id' => null
        ]);
        $dinamica13 = SubRank::firstOrCreate([
            'name' =>'Modelos Mentais',
            'rank_id' =>'3',
            'parent_id' => null
        ]);
        $dinamica14 = SubRank::firstOrCreate([
            'name' =>'Resistência a Mudanças',
            'rank_id' =>'3',
            'parent_id' => null
        ]);
        $frase1 = SubRank::firstOrCreate([
            'name' =>'Pensamentos',
            'rank_id' =>'4',
            'parent_id' => null
        ]);
        $video1 = SubRank::firstOrCreate([
            'name' =>'Administração de Conflitos',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video2 = SubRank::firstOrCreate([
            'name' =>'Avaliação de Desempenho',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video3 = SubRank::firstOrCreate([
            'name' =>'Comportamento do Consumidor',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video4 = SubRank::firstOrCreate([
            'name' =>'Contos  e Fábulas',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video5 = SubRank::firstOrCreate([
            'name' =>'Comunicação',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video6 = SubRank::firstOrCreate([
            'name' =>'Crenças e Valores',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video7 = SubRank::firstOrCreate([
            'name' =>'Finanças',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video8 = SubRank::firstOrCreate([
            'name' =>'Liderança',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video9 = SubRank::firstOrCreate([
            'name' =>'Motivação',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video10 = SubRank::firstOrCreate([
            'name' =>'Planejamento',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video11 = SubRank::firstOrCreate([
            'name' =>'Planejamento de Carreira',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video12 = SubRank::firstOrCreate([
            'name' =>'Poder',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video13 = SubRank::firstOrCreate([
            'name' =>'Qualidade de Vida no Trabalho',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video14 = SubRank::firstOrCreate([
            'name' =>'Sexualidade',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $video15 = SubRank::firstOrCreate([
            'name' =>'Individuação',
            'rank_id' =>'5',
            'parent_id' => null
        ]);
        $parent1 = SubRank::firstOrCreate([
            'name' =>'Contos',
            'rank_id' =>'5',
            'parent_id' => '21'
        ]);
        $parent2 = SubRank::firstOrCreate([
            'name' =>'Fábulas',
            'rank_id' =>'5',
            'parent_id' => '21'
        ]);
        $parent3 = SubRank::firstOrCreate([
            'name' =>'Clips',
            'rank_id' =>'5',
            'parent_id' => '18'
        ]);
        $parent4 = SubRank::firstOrCreate([
            'name' =>'Filmes',
            'rank_id' =>'5',
            'parent_id' => '18'
        ]);
        $parent5 = SubRank::firstOrCreate([
            'name' =>'Animações',
            'rank_id' =>'5',
            'parent_id' => '18'
        ]);
        $metafora1 = SubRank::firstOrCreate([
            'name' =>'Individuação',
            'rank_id' =>'6',
            'parent_id' => null
        ]);
        $metafora2 = SubRank::firstOrCreate([
            'name' =>'Metáfora 2',
            'rank_id' =>'6',
            'parent_id' => null
        ]);
        $literatura1 = SubRank::firstOrCreate([
            'name' =>'Psicanálise Geral',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura2 = SubRank::firstOrCreate([
            'name' =>'Psicanálise Infantil',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura3 = SubRank::firstOrCreate([
            'name' =>'Desenvolvimento Psicosexual',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura4 = SubRank::firstOrCreate([
            'name' =>'Édipo',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura5 = SubRank::firstOrCreate([
            'name' =>'Neuroses',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura6 = SubRank::firstOrCreate([
            'name' =>'Psicoses',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura7 = SubRank::firstOrCreate([
            'name' =>'Simbologia',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura8 = SubRank::firstOrCreate([
            'name' =>'Sonhos',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura9 = SubRank::firstOrCreate([
            'name' =>'Individuação',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura10 = SubRank::firstOrCreate([
            'name' =>'Metáforas',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $literatura11 = SubRank::firstOrCreate([
            'name' =>'Hipnose',
            'rank_id' =>'7',
            'parent_id' => null
        ]);
        $artigo1 = SubRank::firstOrCreate([
            'name' =>'Revista Psique',
            'rank_id' =>'8',
            'parent_id' => null
        ]);
        $artigo2 = SubRank::firstOrCreate([
            'name' =>'Artigos Diversos',
            'rank_id' =>'8',
            'parent_id' => null
        ]);
        $musica1 = SubRank::firstOrCreate([
            'name' =>'Relaxamento',
            'rank_id' =>'9',
            'parent_id' => null
        ]);
    }
}
