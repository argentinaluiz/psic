<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Painel\Subject::class,10)->create();
    }
}
