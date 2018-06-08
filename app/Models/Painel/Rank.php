<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model implements TableInterface
{
    protected $fillable = [
        'name'
    ];

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
        }
    }
}
