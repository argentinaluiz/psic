<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Research;

class ResearchesController extends Controller
{
    public function index()
    {
         $results = Research
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->get();
        return $results;

        /*$psychoanalyst = \Auth::user()->userable;
        $results = $psychoanalyst->researches;
       	return $results;*/
    }

    public function show($id)
    {
        
       $results = Research
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($id);
        return $results;

        /*$psychoanalyst = \Auth::user()->userable;
        $results = $psychoanalyst->researches()->findOrFail($id);
        return $results;*/

    }
}
