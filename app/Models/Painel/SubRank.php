<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class SubRank extends Model implements TableInterface
{
    protected $fillable = [
        'name',
        'rank_id' ,
        'parent_id'
    ];

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function toolkits()
    {
        return $this->hasMany(ClassToolkit::class);
    }
    
    public function getTableHeaders()
    {
        return ['ID', 'Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Categoria':
                return $this->rank_id;
            case 'Subcategoria':
                return $this->parent_id;
        }
    }
}
