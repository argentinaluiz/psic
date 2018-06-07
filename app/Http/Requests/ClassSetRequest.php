<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassSetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $research = $this->route('research');
        return [
            'psychoanalyst_id' => 'required|exists:psychoanalysts,id',
            'category_id'  => [
                'required',
                'exists:categories,id',                 
                Rule::unique('class_sets','category_id', 'psychoanalyst_id' )
                    ->where('research_id',$research->id)
                    ->where('psychoanalyst_id',$this->get('psychoanalyst_id'))
                    ->where('category_id',$this->get('category_id'))
            ]
        ];
    }
}
