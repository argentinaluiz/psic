<?php

use Illuminate\Database\Seeder;

class SubRanksTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Painel\SubRank::class,20)->create();
    }
}
