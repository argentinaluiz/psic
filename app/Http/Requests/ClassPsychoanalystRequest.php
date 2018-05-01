<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassPsychoanalystRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $research = $this->route('research');
        return [
            'psychoanalyst_id' => [
                'required',
                'exists:psychoanalysts,id',
                Rule::unique('psychoanalyst_research','psychoanalyst_id')
                ->where('research_id', $research->id)
            ]
        ];
    }
}
