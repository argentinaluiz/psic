<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassOpting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'type_choice_id',
        'question_choice_id'
    ];

    public function typeChoice(){
        return $this->belongsTo(TypeChoice::class);
    }

    public function questionChoice(){
        return $this->belongsTo(QuestionChoice::class);
    }

    public function toArray()
    {
        $data = parent::toArray();

        $data['type_choice'] = $this->typeChoice;
        $data['question_choice'] = $this->questionChoice;
        return $data;
    }
}
