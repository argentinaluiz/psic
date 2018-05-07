<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Toolkit extends Model
{
    protected $fillable = [
        'document_id','title', 'description', 'link', 'order','deleted'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Título', 'Descrição', 'Link', 'Ordem', 'Deletado'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Título':
                return $this->title;
            case 'Descrição':
                return $this->description;
            case 'Link':
                return $this->link;
            case 'Ordem':
                return $this->order;
            case 'Deletado':
                return $this->deleted?'Sim': 'Não';
        }
    }

  
    public function tool()
    {
      return $this->belongsTo(Tool::class);
    }
 
    public function document()
    {
      return $this->belongsTo(Document::class);
    }
}
