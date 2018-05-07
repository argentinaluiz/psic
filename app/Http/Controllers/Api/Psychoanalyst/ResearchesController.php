<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Research;

class ResearchesController extends Controller
{
    public function index()
    {
        $psychoanalyst = \Auth::user()->userable;
        $results = $psychoanalyst->researches;
        /* $results = Research
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->get();*/
        return $results;
    }

    public function show($id)
    {
        $psychoanalyst = \Auth::user()->userable;
        $results = $psychoanalyst->researches()->findOrFail($id);
        /* $results = Research
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($id);*/
        return $results;
    }
}
