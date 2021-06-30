<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePd extends FormRequest
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
            'product_name'=>'required|max:255',
            'price'=>'required|max:255',
            'image'=>'image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
        ];
    }
}
