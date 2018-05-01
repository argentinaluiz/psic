<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Psychoanalyst extends Model
{
    public function user(){
        return $this->morphOne(\App\User::class,'userable');
    }

    public function researches()
    {
        return $this->belongsToMany(Research::class);//quando estou trabalhando com uma tabela pivot, o método correto é o belongsToMany
    }

    public function toArray()
    {
        $data = parent::toArray();
        $this->user->makeHidden('userable_type','userable_id');
        $data['user'] = $this->user;
        return $data;
    }
}
