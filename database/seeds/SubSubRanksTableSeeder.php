<?php

use Illuminate\Database\Seeder;

class SubSubRanksTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Painel\SubSubRank::class,10)->create();
    }
}
