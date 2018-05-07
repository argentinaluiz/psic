<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tool = $this->route('tool');
        $toolId = $tool instanceof Tool ? $tool->id : null;

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ];

        return $rules;
    }
}
