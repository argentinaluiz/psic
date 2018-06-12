<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassOptingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $type_choice = $this->route('type_choice');
        return [
            'question_choice_id' => [
                'required',
                'exists:question_choices,id',
                Rule::unique('class_optings','question_choice_id')
                    ->where('type_choice_id',$type_choice->id)
            ]
        ];
    }
}
