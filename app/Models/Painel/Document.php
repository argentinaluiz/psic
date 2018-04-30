<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        "title","description","deleted"
      ];
    
      public function folders()
      {
        return $this->hasMany('App\Models\Painel\Folder');
      }


      public function Url()
      {
        $url = asset($this->folders()->first()->url);
        
        return $url;
      }
  
}
