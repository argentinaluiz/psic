<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassPsychoanalystRequest;
use App\Models\Painel\Research;
use App\Models\Painel\Psychoanalyst;

class ClassPsychoanalystsController extends Controller
{
    public function index(Request $request,Research $research)
    {
        return view('painel.researches.class_psychoanalyst', compact('research'));
    }

    public function store(ClassPsychoanalystRequest $request,Research $research)
    {
        //
    }

    public function destroy(Research $research, Psychoanalyst $psychoanalyst)
    {
        //
    }
}
