<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassPsychoanalystRequest;
use App\Models\Painel\Research;
use App\Models\Painel\Psychoanalyst;

class ClassPsychoanalystsController extends Controller
{
    public function index(Request $request, Research $research)
    {
        if(!$request->ajax()) {
            return view('admin.researches.class_psychoanalyst', compact('research'));
        }else{
            return $research->psychoanalysts()->get();
        }
    }


    public function store(ClassPsychoanalystRequest $request, Research $research)
    {
        $psychoanalyst = Psychoanalyst::find($request->get('psychoanalyst_id'));
        $research->psychoanalysts()->save($psychoanalyst);
        return $psychoanalyst;
    }

    public function destroy(Research $research, Psychoanalyst $psychoanalyst)
    {
        $research->psychoanalysts()->detach([$psychoanalyst->id]);
        return response()->json([],204); //status code - no content, ou seja, informa que a operação requisitada aconteceu com sucesso, mas não têm nenhum conteúdo para ser mostrado
    }
}
