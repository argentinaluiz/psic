<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model implements TableInterface
{
    protected $fillable = [
        'name'
    ];

    public function tools()
    {
        return $this->hasMany(ClassToolkit::class);
    }


    public function subRanks()
    {
        return $this->hasMany(ClassToolkit::class, 'rank_id', 'id');
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
        }
    }
}
