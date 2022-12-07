<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class StoreOrderItemsRequest extends FormRequest
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
            'fk_order' => 'required',
            'fk_stock' => 'required',
            'product_quantity' => 'required|min:0'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'min' => ':attribute has to be greater than :min'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'fk_order' => 'Order',
            'fk_stock' => 'Stock',
            'product_quantity' => 'Quantity'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    public function failedValidation(Validator $validator)
    {
        $error_messages = $validator->errors()->all();
        throw new HttpResponseException(
            response()->json(
                [
                    'message' => $error_messages,
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
