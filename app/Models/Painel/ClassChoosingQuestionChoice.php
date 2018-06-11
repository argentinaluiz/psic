<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassChoosingQuestionChoice extends Model
{
    protected $fillable = [
        'class_choosing_id',
        'question_choice_id'
    ];

    public function choosing(){
        return $this->belongsTo(ClassChoosing::class);
    }

    public function choices(){
        return $this->belongsTo(QuestionChoice::class);
    }
    
}
