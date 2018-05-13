<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassToolRequest;
use App\Models\Painel\Tool;
use App\Models\Painel\Psychoanalyst;

class ClassToolsController extends Controller
{
    public function index(Request $request, Tool $tool)
    {
        if(!$request->ajax()) {
            return view('admin.tools.class_psychoanalyst', compact('tool'));
        }else{
            return $tool->psychoanalysts()->get();
        }
    }


    public function store(ClassToolRequest $request, Tool $tool)
    {
        $psychoanalyst = Psychoanalyst::find($request->get('psychoanalyst_id'));
        $tool->psychoanalysts()->save($psychoanalyst);
        return $psychoanalyst;
    }

    public function destroy(Tool $tool, Psychoanalyst $psychoanalyst)
    {
        $tool->psychoanalysts()->detach([$psychoanalyst->id]);
        return response()->json([],204); //status code - no content, ou seja, informa que a operação requisitada aconteceu com sucesso, mas não têm nenhum conteúdo para ser mostrado
    }
}
