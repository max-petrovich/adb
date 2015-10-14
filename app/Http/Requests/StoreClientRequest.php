<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreClientRequest extends Request
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
            // Basic info
            'last_name' => [
                'required', 'between:2,20',
                'regex:/[A-ZА-ЯЁa-zа-яё-]+/u',
            ],
            'first_name' => [
                'required', 'between:2,20',
                'regex:/[A-ZА-ЯЁa-zа-яё-]+/u',
            ],
            'middle_name' => [
                'required', 'between:2,20',
                'regex:/[A-ZА-ЯЁa-zа-яё-]+/u',
            ],
            'birth_date' => [
                'required', 'date', 'before:now'
            ],
            'sex' => [
                'in:M,F'
            ],
            'marital_status_id' => [
                'exists:marital_statuses,id'
            ],
            'nationality_id' => [
                'exists:nationalities,id'
            ],
            // Contacts
            'contacts.email' => [
               'email', 'unique:user_contacts,email,' . $this->client . ',user_id'
            ],
            'contacts.phone_home' => [
                'digits:9'
            ],
            'contacts.phone_mobile' => [
                'digits:9'
            ],
            // Passport
            'passport.series' => [
                'required', 'alpha', 'size:2', 'regex:/[A-Z]{2}/'
            ],
            'passport.number' => [
                'required', 'digits:7',
                'unique:user_passports,number,' . $this->client . ',user_id,series,'. $this->input('passport.series')
            ],
            'passport.passport_id' => [
                'required', 'regex:/^\d{7}[A-Z]\d{3}[A-Z]{2}\d$/u',
                'unique:user_passports,passport_id,' . $this->client . ',user_id'
            ],
            'passport.issued_organization' => [
                'required', 'string'
            ],
            'passport.issue_date' => [
                'required', 'date', 'before:now'
            ],
            // Location
            'location.birth_place' => [
                'required', 'string'
            ],
            'location.actual_city_id' => [
                'exists:cities,id'
            ],
            'location.actual_address' => [
                'required', 'string'
            ],
            'location.residence_city_id' => [
                'exists:cities,id'
            ],
            'location.residence_address' => [
                'required', 'string'
            ],
            // Social Info
            'socialInfo.reservist' => [
                'boolean'
            ],
            'socialInfo.pensioner' => [
                'boolean'
            ],
            'socialInfo.disability_id' => [
                'exists:disabilities,id'
            ],
            // Works
            'work.work_place' => [
                'string'
            ],
            'work.position' => [
                'string'
            ],
            'work.position' => [
                'numeric'
            ]
        ];
    }

}
