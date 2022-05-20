<?php

namespace App\Http\Requests;

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
        return [
            'name' => 'required|string|min:3|max:255',
            'code' => 'required|string|min:3|max:255|unique:products,code'.(!empty($this->product) ? ','.$this->product->id : ''),
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif',
            'hit' => 'nullable|regex:[on]',
            'new' => 'nullable|regex:[on]',
            'recomend' => 'nullable|regex:[on]',
           // 'price' => 'required|numeric|min:1',
            'category_id' => 'required|string|exists:categories,id',
        ];
    }
}
