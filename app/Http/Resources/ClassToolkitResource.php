<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClassToolkitResource extends Resource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tool_id' => $this->tool,
            'rank_id'=> $this->rank,
           // 'sub_ranks' => $this->subRanks,
           // 'ranks' => RankResource::collection($this->subRanks),
        ];
    }
}
