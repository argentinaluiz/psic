<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RankCustomResource extends ResourceCollection
{

    public function toArray($request)
    {
        $ranks = $this->collection; //terá a coleção de ranks
            $ranksResult = [];
            foreach ($ranks as $rank) {
                $rankNew = ['name' => $rank->name, 'subRanks' => []];
                foreach ($rank->subRanks as $subRank) {//lembre-se que subRank é ClassToolkit
                    $subRankNew = ['name' => $subRank->subRank->name, 'subSubRanks' => []];
                    foreach ($subRank->subSubRanks as $subSubRank) {  //novamente subSubRank é ClassToolkit
                        $subSubRankNew = ['name' => $subSubRank->subSubRank->name, 'tools'  => []];
                        foreach ($subSubRank->tools as $tool) {  //tool é ClassToolkit
                            $toolNew = ['name' => $tool->tool->name];
                            $subRankNew['tools'][] = $toolNew;
                        }
                        $subRankNew['subSubRanks'][] = $subSubRankNew;
                    }
                    $rankNew['subRanks'][] = $subRankNew;
                }
                $rankResult[] = $rankNew;
            }
            return $rankResult;
    }
}
