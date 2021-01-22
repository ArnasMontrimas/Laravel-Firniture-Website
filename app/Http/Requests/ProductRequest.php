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
            'productName' => ['required','regex:/^[a-zA-Z\s]*$/','max:30'],
            'productCategory' => ['required','regex:/^[a-zA-Z\s]*$/','max:20'],
            'productPrice' => 'required|numeric|between:0,9999999',
            'productCost' => 'required|numeric|between:0,9999999',
            'productParts' => 'required|numeric|between:0,9999999|lte:productCost',
            'productBuildTime' => 'required|numeric|between:0,9999999',
            'productImage' => 'image|nullable|max:1999'
        ];
    }
}
