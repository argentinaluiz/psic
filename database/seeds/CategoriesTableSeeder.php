<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        factory(\App\Models\Painel\Category::class,10)->create();
    }
}
