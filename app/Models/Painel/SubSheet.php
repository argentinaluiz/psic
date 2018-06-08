<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class SubSheet extends Model implements TableInterface
{
    protected $fillable = [
        'name'
    ];

    public function meetings()
    {
        return $this->hasMany(ClassMeeting::class);//não é um relacionamento com uma tabela pivot. Cada classe tem muitas sessões relacionadas
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
