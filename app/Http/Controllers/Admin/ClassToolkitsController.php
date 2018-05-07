<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ClassToolkitRequest;
use App\Models\Painel\Tool;
use App\Models\Painel\ClassToolkit;

class ClassToolkitsController extends Controller
{
    public function index(Request $request,Tool $tool)
    {
        if(!$request->ajax()) {
            return view('admin.tools.class_toolkit', compact('tool'));
        }else{
            return $tool->toolkits()->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassToolkitRequest $request,Tool $tool)
    {
        $toolkit = $tool->toolkits()->create([
            'rank_id' => $request->get('rank_id'),
            'sub_rank_id' => $request->get('sub_rank_id'),
            'sub_sub_rank_id' => $request->get('sub_sub_rank_id'),
        ]);
        //dd($toolkit);
        return $toolkit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool, ClassToolkit $toolkit)
    {
        $toolkit->delete();
        return response()->json([],204); //status code - no content
    }
}
