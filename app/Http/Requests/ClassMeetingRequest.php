<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassMeetingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $class_information = $this->route('class_information');
        return [
            'psychoanalyst_id' => 'required|exists:psychoanalysts,id',
            'subject_id' => [
                'required',
                'exists:subjects,id',
                Rule::unique('class_meetings','subject_id')
                    ->where('class_information_id',$class_information->id)
                    ->where('psychoanalyst_id',$this->get('psychoanalyst_id'))
            ]
        ];
    }
}
