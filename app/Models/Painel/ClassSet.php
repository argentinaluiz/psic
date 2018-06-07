<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassSet extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'research_id',
        'category_id',
        'psychoanalyst_id'
    ];

    public function research(){
        return $this->belongsTo(Research::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function psychoanalyst(){
        return $this->belongsTo(Psychoanalyst::class);
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['research'] = $this->research;
        $data['category'] = $this->category;
        $data['psychoanalyst'] = $this->psychoanalyst;
        return $data;
    }
}
