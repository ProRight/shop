<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'code' => 'required|string|min:3|max:255|unique:categories,code'.(!empty($this->category) ? ','.$this->category->id : ''),
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif',

        ];
    }
}
