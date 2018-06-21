<?php

use Illuminate\Database\Seeder;

class SubSheetsTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Painel\SubSheet::class,10)->create();
    }
}
