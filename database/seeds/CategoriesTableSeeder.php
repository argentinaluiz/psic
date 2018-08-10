<?php

use Illuminate\Database\Seeder;
use App\Models\Painel\Category;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
       // factory(\App\Models\Painel\Category::class,10)->create();
    	$category1 = Category::firstOrCreate([
            'name' =>'Aparelho Psíquico',
            'slug' =>'Ap',
        ]);
        $category2 = Category::firstOrCreate([
            'name' =>'Pulsões',
            'slug' =>'Pul',
        ]);
        $category3 = Category::firstOrCreate([
            'name' =>'Representações',
            'slug' =>'Rep',
        ]);
        $category4 = Category::firstOrCreate([
            'name' =>'Representação/Recalque',
            'slug' =>'RepRec',
        ]);
        $category5 = Category::firstOrCreate([
            'name' =>'Sombra',
            'slug' =>'Sombra',
        ]);
        $category6 = Category::firstOrCreate([
            'name' =>'Édipo',
            'slug' =>'Ed',
        ]);
        $category7 = Category::firstOrCreate([
            'name' =>'Defesa',
            'slug' =>'Def',
        ]);
        $category8 = Category::firstOrCreate([
            'name' =>'Recursos',
            'slug' =>'Rec',
        ]);
        $category9 = Category::firstOrCreate([
            'name' =>'Neuroses',
            'slug' =>'Neu',
        ]);
        $category10 = Category::firstOrCreate([
            'name' =>'Depressão',
            'slug' =>'Dep',
        ]);
    }
}
