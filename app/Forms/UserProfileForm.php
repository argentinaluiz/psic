<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserProfileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('address', 'text', [
                'label' => 'Endereço',
                'rules' => 'required|max:255'
            ])
            ->add('cep', 'text', [
                'label' => 'CEP',
                'rules' => 'required|max:8'
            ])
            ->add('number', 'text', [
                'label' => 'Número',
                'rules' => 'required|max:255'
            ])
            ->add('complement', 'text', [
                'label' => 'Complemento',
                'rules' => 'max:255'
            ])

            ->add('state_id', 'entity', [
                'label' => 'Estado', 
                'class' => '\App\Models\Painel\State', // Entity that holds data
                'property' => 'name', // Value that will be used as a label for each choice option, default: name 
                'property_key' => 'id',
                'selected' => $this->model ? $this->model->city->state_id : '25'
            ])

            ->add('city_id', 'entity', [
                'label' => 'Cidade', 
                'class' => '\App\Models\Painel\City', 
                'property' => 'name', 
                'property_key' => 'id', 
                
            ])

            ->add('neighborhood', 'text', [
                'label' => 'Bairro',
                'rules' => 'required|max:255'
            ]);
    }


}
