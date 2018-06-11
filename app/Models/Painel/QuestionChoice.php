<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $fillable = [
        'choice',
        'true',
        'question_id'
    ];

    protected $casts = [
        'true' => 'boolean'
    ];

    public function choosings()
    {
        return $this->hasMany(ClassChoosing::class);
    }

  

}
