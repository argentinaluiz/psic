<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $research = $this->route('research');
        $researchId = $research instanceof Research ? $research->id : null;

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ];

        return $rules;
    }
}
