<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ClassSetRequest;
use App\Models\Painel\Research;
use App\Models\Painel\ClassSet;

class ClassSetsController extends Controller
{
    public function index(Request $request,Research $research)
    {
        if(!$request->ajax()) {
            return view('admin.researches.class_set', compact('research'));
        }else{
            return $research->sets()->get();
        }
    }

    public function store(ClassSetRequest $request,Research $research)
    {
        $set = $research->sets()->create([
            'category_id' => $request->get('category_id'),
            'psychoanalyst_id' => $request->get('psychoanalyst_id'),
        ]);
        return $set;
    }

    public function destroy(Research $research, ClassSet $set)
    {
        $set->delete();
        return response()->json([],204); //status code - no content
    }
}
