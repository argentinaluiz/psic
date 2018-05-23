<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use App\Models\Painel\ClassToolkit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassToolkitsController extends Controller
{
    public function index()
    {
        $results = ClassToolkit
            ::where('psychoanalyst_id', \Auth::user()->userable->id)
            ->orderBy('rank_id', 'ASC')
            ->get()
            ->toArray();//Utilizamos o método toArray para transformar a resposta em array e, antes de retornar, removemos os dados desnecessários, que neste caso são os dados do psicanalista. Lembrando que quanto menos dados for passado na resposta, mais rápida será a aplicação.

        return array_map(function ($item) {//mapear cada elemento do array
            unset($item['psychoanalyst']);
            return $item;
        }, $results);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ClassToolkit
            ::where('psychoanalyst_id', \Auth::user()->userable->id)
            ->findOrFail($id)
            ->toArray();

        unset($result['psychoanalyst']);
        return $result;
    }
}
