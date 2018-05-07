<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Painel\SubSubRank;

class SubSubRankForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('name', 'text', [
            'label' => 'Nome',
            'rules' => 'required|max:255'
        ]);
    }
}
