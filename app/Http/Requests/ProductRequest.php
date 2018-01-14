<?php

namespace App\Http\Requests;

use App\Models\Painel\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $product = $this->route('product');
        $productId = $product instanceof Product ? $product->id : null;

        $rules = [
            'name'          => 'required|min:3|max:50',
            'image'         => 'image',
            'description'   => 'min:3|max:1000',
            'old_price'     => 'required',
            'price'         => 'required'
        ];

        return $rules;
    }
}
