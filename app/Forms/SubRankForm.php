<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Painel\SubRank;

class SubRankForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('name', 'text', [
            'label' => 'Nome',
            'rules' => 'required|max:255'
        ])

        ->add('rank_id', 'entity', [
                'label' => 'Categoria', 
                'class' => '\App\Models\Painel\Rank', // Entity that holds data
                'property' => 'name', // Value that will be used as a label for each choice option, default: name 
                'property_key' => 'id',
                'selected' => $this->model ? $this->model->SubRank->rank_id : '5'
        ])

        ->add('parent_id', 'entity', [
                'label' => 'Sub SubCategoria (parent)', 
                'class' => '\App\Models\Painel\SubRank', 
                'property' => 'name', 
                'property_key' => 'id',
                'selected' => $this->model ? $this->model->SubRank->parent_id : '35',
        ]);
    }
}
