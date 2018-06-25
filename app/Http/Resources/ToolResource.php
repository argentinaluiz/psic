<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ToolResource extends Resource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'year' =>$this->year,
            /* para número
               'price'=>(float) $this->price
            */

        ];
        
    }
}
