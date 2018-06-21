<?php

use Illuminate\Database\Seeder;

class ListChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Painel\ListChoice::class,10)->create();
    }
}
