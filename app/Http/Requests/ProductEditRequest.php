<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductEditRequest extends Request
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
            'title' => 'required|max:75|min:3|unique:products',
            'stock' => 'required|max:2|min:1',
            'size' => 'required',
            'price' => 'required|max:9||min:1',
            'reduce_price' => 'max:9||min:1',
            'description' => 'required|max:2500|min:10',
            'model' => 'required',
            // not using `image` rule, as that will allow svg
            'photo' => 'mimes:jpeg,png|max:10240'
        ];
    }
}
