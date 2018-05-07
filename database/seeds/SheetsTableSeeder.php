<?php

use Illuminate\Database\Seeder;

class SheetsTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Painel\Sheet::class,20)->create();
    }
}
