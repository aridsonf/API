<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fk_product' => 'required',
            'value' => 'required|numeric',
            'inbound' => 'required|numeric',
            'validate_date' => 'required|date'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'numeric' => ':attribute has to be a number',
            'date' => ':attribute has to be a date'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'validate_date' => 'Validate',
            'fk_product' => 'Product',
            'value' => 'Value',
            'inbound' => 'Stock Quantity'
        ];
    }
}
