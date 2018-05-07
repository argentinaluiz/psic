<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassToolRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tool = $this->route('tool');
        return [
            'psychoanalyst_id' => [
                'required',
                'exists:psychoanalysts,id',
                Rule::unique('psychoanalyst_tool','psychoanalyst_id')
                ->where('tool_id', $tool->id)
            ]
        ];
    }
}
