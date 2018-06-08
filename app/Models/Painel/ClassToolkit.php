<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassToolkit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'tool_id',
        'rank_id',
        'sub_rank_id',
        'sub_sub_rank_id',
        'psychoanalyst_id'
    ];


    public function tool(){
        return $this->belongsTo(Tool::class);
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function subRank(){
        return $this->belongsTo(SubRank::class);
    }

    public function subSubRank(){
        return $this->belongsTo(SubSubRank::class);
    }

    public function psychoanalyst(){
        return $this->belongsTo(Psychoanalyst::class);
    }


    public function toArray()
    {
        $data = parent::toArray();
        $data['tool'] = $this->tool;
        $data['rank'] = $this->rank;
        $data['sub_rank'] = $this->subRank;
        $data['sub_sub_rank'] = $this->subSubRank;
        $data['psychoanalyst'] = $this->psychoanalyst;
        return $data;
    }

}
