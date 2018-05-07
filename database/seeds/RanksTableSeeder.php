<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Painel\Rank::class,20)->create();
    }
}
