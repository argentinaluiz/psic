<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassOptingRequest;
use App\Models\Painel\ClassOpting;
use App\Models\Painel\TypeChoice;

class ClassOptingsController extends Controller
{
    public function index(Request $request,TypeChoice $type_choice)
    {
        if(!$request->ajax()) {
            return view('admin.type_choices.class_opting', compact('type_choice'));
        }else{
            return $type_choice->optings()->get();
        }
    }

   public function store(ClassOptingRequest $request,TypeChoice $type_choice)
    {
        $opting = $type_choice->optings()->create([
            'question_choice_id' => $request->get('question_choice_id'),
        ]);
        return $opting;
    }
    
    public function destroy(TypeChoice $type_choice, ClassOpting $opting)
    {
        $opting->delete();
        return response()->json([],204); //status code - no content
    }
}
