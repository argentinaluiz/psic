<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = [
        'title',
        'image',
        'tag',
        'description',
        'year',
        'active'
    ];

    public function documents()
    {
      return $this->hasMany(Arcade::class);
    }

    public function sets()
    {
        return $this->hasMany(ClassSet::class);
    }

    public function scopeByPsychoanalyst($query, $psychoanalystId)
    {
        return $query->whereHas('sets', function ($query) use($psychoanalystId){
            $query->where('psychoanalyst_id', $psychoanalystId);
        });
    }

    public function getTextCategoriesAttribute($value)
    {
        $categories = $this->categories;
        $text = "";
        foreach ($categories as $key => $value) {
          if($key == 0){
            $text .= $value->name;
          }else{
            $text .= ", ".$value->name;
          }

        }
        return $text;
    }

    public function newResearch($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    public function updateResearch($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        
        return $this->update($data);
    }

}
