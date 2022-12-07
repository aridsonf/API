<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class StoreOrdersRequest extends FormRequest
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
            'status' => 'required|size:0',
            'delivery_date' => 'prohibited',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'size' => ':attribute has to be a value equal to :size',
            'prohibited' => ":attribute can't be set in creation of stock"
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'status' => 'Status',
            'delivery_date' => 'Delivery date'
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
