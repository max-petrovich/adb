<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCreditRequest extends Request
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
            'user_id' => [
                'exists:users,id'
            ],
            'credit_type_id' => [
                'exists:credit_types,id'
            ],
            'credit_rate_id' => [
                'exists:credit_rates,id'
            ],
            'date_start' => [
                'required', 'date', 'after:yesterday'
            ],
            'amount' => [
                'required', 'digits_between:1,28', 'min_value:0'
            ]
        ];
    }
}
