<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassToolkit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'tool_id',
        'sub_rank_id',
        'psychoanalyst_id'
    ];


    public function tool(){
        return $this->belongsTo(Tool::class);
    }

    public function subRank(){
        return $this->belongsTo(SubRank::class);
    }

    public function subRanks(){
        return $this->hasMany(ClassToolKit::class, 'sub_rank_id', 'sub_rank_id')
            ->groupBy('sub_rank_id');
    }

    public function tools(){
        return $this->hasMany(ClassToolKit::class, 'tool_id', 'tool_id')
            ->groupBy('tool_id');
    }

    public function psychoanalyst(){
        return $this->belongsTo(Psychoanalyst::class);
    }


    public function toArray()
    {
        $data = parent::toArray();
        $data['tool'] = $this->tool;
        $data['sub_rank'] = $this->subRank;
        $data['psychoanalyst'] = $this->psychoanalyst;
        return $data;
    }

}
