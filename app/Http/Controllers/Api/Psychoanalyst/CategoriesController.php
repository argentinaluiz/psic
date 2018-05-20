<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Category;
use App\Models\Painel\Research;

class CategoriesController extends Controller
{
    public function index()
    {
        // $category = Category::with('researches')->get();

        $research = Research::with('categories')->first();
        $results = $research->categories;

        return $results;
    }

}

