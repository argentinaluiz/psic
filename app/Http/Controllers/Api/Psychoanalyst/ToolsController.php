<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Tool;

class ToolsController extends Controller
{
    public function index()
    {
       // $psychoanalyst = \Auth::user()->userable;
       // $results = $psychoanalyst->tools;
        $results = Tool
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->get();
        return $results;
    }

    public function show($id)
    {
        //$psychoanalyst = \Auth::user()->userable;
        //$results = $psychoanalyst->tools()->findOrFail($id);
        $results = Tool
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($id);
        return $results;
    }
}