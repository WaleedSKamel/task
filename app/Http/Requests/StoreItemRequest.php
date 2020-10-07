<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:150',
            'price' =>'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This filed name is required',
            'name.min' => 'This filed name must be min 2 char',
            'name.max' => 'This filed name must be max 150 char',
            'name.string' => 'This filed name must be char',

            'price.required' => 'This filed price is required',
            'price.min' => 'This filed price must be min 1',
            'price.regex' => 'This filed price not match',

            'image.required' => 'This filed image is required',
            'image.image' => 'This filed image must be image',
            'image.mimes' => 'This filed image is mimes jpg,jpeg,png,bmp',
        ];
    }
}
