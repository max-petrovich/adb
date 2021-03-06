<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "Поле <b>:attribute</b> может содержать только буквы.",
	"alpha_dash"           => "Поле <b>:attribute</b> может содержать только буквы и знак знак дефиса.",
	"alpha_num"            => "Поле <b>:attribute</b> может содержать только буквы и цифры.",
	"array"                => "The :attribute must be an array.",
	"before"               => "Дата в поле <b>:attribute</b> должна быть ранее указанной даты - :date.",
	"between"              => [
		"numeric" => "Значение поля <b>:attribute</b> должна быть между :min и :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "Длина строки <b>:attribute</b> должна быть между :min и :max символов.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "Дата в поле <b>:attribute</b> не корректна.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "Значение в поле <b>:attribute</b> должно быть :digits цифр.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "Поле <b>:attribute</b> должно содержать корректный email.",
	"filled"               => "The :attribute field is required.",
	"exists"               => "Выбранное значение поля <b>:attribute</b> не корректно.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	],
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => [
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "Поле <b>:attribute</b> должно содержать только цифры.",
	"regex"                => "Поле <b>:attribute</b> имеет некорректный формат.",
	"required"             => "Поле <b>:attribute</b> обязательно к заполнению",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => "Размер поля <b>:attribute</b> должен быть :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "Длина строки <b>:attribute</b> должна быть :size символов.",
		"array"   => "The :attribute must contain :size items.",
	],
	"unique"               => "Значение в поле <b>:attribute</b> уже существует в базе.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

	"min_value"            => "Значение в поле <b>:attribute</b> должно быть более :min",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'middle_name' => 'Отчество',
        'birth_date' => 'Дата рождения',
        'sex' => 'Пол',
        'marital_status_id' => 'Семейное положение',
        'nationality_id' => 'Национальность',
        'contacts' => [
            'email' => 'Email',
            'phone_home' => 'Домашний телефон',
            'phone_mobile' => 'Мобильный телефон'
        ],
        'passport' => [
            'series' => 'Серия пасспорта',
            'number' => 'Номер пасспорта',
            'passport_id' => 'Идентификационный номер',
            'issued_organization' => 'Кем выдан',
            'issue_date' => 'Дата выдачи'
        ],
        'location' => [
            'birth_place' => 'Место рождения',
            'actual_city_id' => 'Город фактического проживания',
            'actual_address' => 'Адрес фактического проживания',
            'residence_city_id' => 'Город прописки',
            'residence_address' => 'Адрес прописки',
        ],
        'socialInfo' => [
            'reservist' => 'Военнообязанный',
            'pensioner' => 'Пенсионер',
            'disability_id' => 'Инвалидность'
        ],
        'work' => [
            'work_place' => 'Место работы',
            'position' => 'Должность',
            'salary' => 'Ежемесячный доход'
        ],

		'user_id' => 'Клиент',
		// Deposit
		'contract_number' => 'Номер договора',
		'deposit_type_id' => 'Тип депозита',
		'rate_id' => 'Депозитная линия',
		'amount' => 'Сумма',


			//
		'card_number' => 'Номер карты',
		'password' => 'PIN-код',
		'sum' => 'Сумма',
		'phone_number' => 'Номер телефона'
    ],

];
