<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassToolkitRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tool = $this->route('tool');
        return [
            'rank_id' => 'required|exists:ranks,id',
            'sub_rank_id'  => [
                'required',
                'exists:sub_ranks,id',                 
                Rule::unique('class_toolkits','rank_id', 'sub_rank_id' )
                    ->where('tool_id',$tool->id)
                    ->where('rank_id',$this->get('rank_id'))
            ]
        ];
    }
}
