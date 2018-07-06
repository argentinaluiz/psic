<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassToolkit;
use App\Models\Painel\Rank;
use App\Models\Painel\SubRank;
use App\Models\Painel\SubSubRank;

class ClassToolkitsController extends Controller
{
    public function index()
    {
        $ranks = Rank
            ::with('subRanks.subSubRanks')
            ->get();
        return new \App\Http\Resources\RankCustomResource($ranks);
     //  return RankCustomResource::collection($ranks);
       /*$ranks = Rank
            ::with('subRanks.subSubRanks')
           // ->join('class_toolkits', 'class_toolkits.rank_id', '=', 'ranks.id')
           // ->where('class_toolkits.psychoanalyst_id', \Auth::user()->userable->id)
           // ->orderBy('rank_id', 'ASC')
            ->get();
       return $ranks;
       */
       
       
       /* $results = \DB::table('ranks')
         ->join('class_toolkits', 'class_toolkits.rank_id', '=', 'ranks.id')
         ->where('class_toolkits.psychoanalyst_id', \Auth::user()->userable->id)
         //->where('class_toolkits.sub_rank_id', 'sub_ranks.id')
         //->where('class_toolkits.sub_sub_rank_id', 'sub_sub_ranks.id')
         // ->where('class_toolkits.rank_id','=', 1)
         ->get();
         return $results;
        */


       /* $results = ClassToolkit
            ::where('psychoanalyst_id', \Auth::user()->userable->id)
            ->with ('rank', 'subRank')
            ->groupBy ('rank_id',  'id')
            ->orderBy('rank_id', 'ASC')
            ->get()
            
            ->toArray();//Utilizamos o método toArray para transformar a resposta em array e, antes de retornar, removemos os dados desnecessários, que neste caso são os dados do psicanalista. Lembrando que quanto menos dados for passado na resposta, mais rápida será a aplicação.

            return array_map(function ($item) {//mapear cada elemento do array
            unset($item['psychoanalyst']);
            return $item;
        }, $results);
        */
       
        
      /* $results = Rank
            ::with(['toolkits.rank'])
            ->groupBy ('id',  'id')
            ->get()
            ->toArray();

            return array_map(function ($item) {//mapear cada elemento do array
                //unset($item['psychoanalyst']);
                return $item;
            }, $results);
        */
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
