<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class StoreStockRequest extends FormRequest
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
            'fk_product' => 'required',
            'value' => 'required|numeric|gt:0',
            'inbound' => 'required|numeric|integer|gt:0',
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
            'date' => ':attribute has to be a date',
            'gt' => ':attribute has to be greater than :value',
            'integer' => ':attribute must to be a integer'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'fk_product' => 'Product',
            'validate_date' => 'Validate',
            'value' => 'Value',
            'inbound' => 'Initial Stock Quantity'
        ];
    }

    /**
     * Summary of failedValidation
     * @param Validator $validator
     * @throws HttpResponseException
     * @return never
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
