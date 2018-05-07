<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'year',
        'active'
    ];

    public function documents()
    {
      return $this->hasMany(Toolkit::class);
    }

     public function psychoanalysts()
    {
        return $this->belongsToMany(Psychoanalyst::class);
    }

    public function toolkits()
    {
        return $this->hasMany(ClassToolkit::class);
    }

    public function newTool($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    public function updateTool($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        
        return $this->update($data);
    }
}
