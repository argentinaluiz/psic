<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RankCustomResource extends ResourceCollection
{

    public function toArray($request)
    {
        $ranks = $this->collection; //terá a coleção de ranks
            $ranksResult = [];
            $subRanks = $ranks->subRanks;
            foreach($ranks as $rank){
                $rankNew = ['name' => $rank->name, 'subRanks' => [] ];
                foreach($subRank->subSubRanks as $subSubRank) {  //novamente subsubrank é ClassToolKit
                    $subRankNew = ['name' => $subRank->subRank->name, 'subSubRanks' => [] ];
                    foreach($subRank->subSubRanks as $subSubRank) {  //novamente subsubrank é ClassToolKit
                        $subSubRankNew = ['name' => $subSubRank->subSubRank->name];
                        $subRankNew['subSubRanks'][] = $subSubRankNew;
                    }
                    $rankNew['subRanks'][] = $subRankNew;
                }
            $rankResult[] = $rankNew;
            }
    }
}
