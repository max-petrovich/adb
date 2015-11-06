<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreDepositRequest extends Request
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
            'contract_number' => [
                'required', 'digits_between:1,13'
            ],
            'user_id' => [
                'exists:users,id'
            ],
            'deposit_type_id' => [
                'exists:deposit_types,id'
            ],
            'deposit_rate_id' => [
                'exists:deposit_rates,id'
            ],
            'date_start' => [
                'required', 'date', 'after:yesterday'
            ],
            'amount' => [
                'required', 'digits_between:1,28'
            ]
        ];
    }
}
