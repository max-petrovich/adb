<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePaymentRequest extends Request
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
            'sum' => 'required|numeric|min_value:0',
            'phone_number' => 'required|digits:9'
        ];
    }
}
