@include('client.partials.errors')

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

@section ('panel1_panel_title', 'Основная информация')
@section ('panel1_panel_body')
    <div class="col-sm-12">
        <div class="row">

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('last_name', 'Фамилия:', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'data-inputmask-regex' => "[A-ZА-ЯЁa-zа-яё-]+"]) !!}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('first_name', 'Имя:', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'data-inputmask-regex' => "[A-ZА-ЯЁa-zа-яё-]+"]) !!}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('middle_name', 'Отчество:', ['class' => 'control-label']) !!}
                    {!! Form::text('middle_name', null, ['class' => 'form-control', 'data-inputmask-regex' => "[A-ZА-ЯЁa-zа-яё-]+"]) !!}
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('birth_date', 'Дата рождения:', ['class' => 'control-label']) !!}
                    {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('sex', 'Пол:', ['class' => 'control-label']) !!}
                    {!! Form::select('sex', ['M' => trans('sex.M'), 'F' => trans('sex.F')], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('marital_status_id', 'Семейное положение:', ['class' => 'control-label']) !!}
                    {!! Form::select('marital_status_id', $marital_statuses, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('nationality_id', 'Гражданство:', ['class' => 'control-label']) !!}
                    {!! Form::select('nationality_id', $nationalities, null, ['class' => 'form-control']) !!}
                </div>
            </div>

        </div>

    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'panel1'))

@section ('panel2_panel_title', 'Контакты')
@section ('panel2_panel_body')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('contacts[email]', 'Email:(необяз.)', ['class' => 'control-label']) !!}
                    {!! Form::email('contacts[email]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('contacts[phone_home]', 'Домашний телефон:(необяз.)', ['class' => 'control-label']) !!}
                    {!! Form::tel('contacts[phone_home]', null, ['class' => 'form-control', 'data-inputmask' => "'mask': '(999) 99-99-99'"]) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('contacts[phone_mobile]', 'Мобильный:(необяз.)', ['class' => 'control-label']) !!}
                    {!! Form::text('contacts[phone_mobile]', null, ['class' => 'form-control', 'data-inputmask' => "'mask': '+375 (99) 999-99-99'"]) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'panel2'))

@section ('panel3_panel_title', 'Паспортные данные')
@section ('panel3_panel_body')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-1">
                <div class="form-group">
                    {!! Form::label('passport[series]', 'Серия:', ['class' => 'control-label']) !!}
                    {!! Form::text('passport[series]', null, ['class' => 'form-control', 'data-inputmask-regex' => "[A-Z]{2}"]) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('passport[number]', 'Номер:', ['class' => 'control-label']) !!}
                    {!! Form::text('passport[number]', null, ['class' => 'form-control', 'data-inputmask' => "'mask': '9{7}'"]) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('passport[passport_id]', 'Идентификационный номер:', ['class' => 'control-label']) !!}
                    {!! Form::text('passport[passport_id]', null, ['class' => 'form-control', 'data-inputmask-regex' => "[0-9]{7}[A-Z][0-9]{3}[A-Z]{2}[0-9]"]) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('passport[issued_organization]', 'Кем выдан:', ['class' => 'control-label']) !!}
                    {!! Form::text('passport[issued_organization]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('passport[issue_date]', 'Дата выдачи:', ['class' => 'control-label']) !!}
                    {!! Form::date('passport[issue_date]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'panel3'))

@section ('panel4_panel_title', 'Города и прописка')
@section ('panel4_panel_body')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('location[birth_place]', 'Место рождения:', ['class' => 'control-label']) !!}
                    {!! Form::text('location[birth_place]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('location[actual_city_id]', 'Город факт. проживания:', ['class' => 'control-label']) !!}
                    {!! Form::select('location[actual_city_id]', ['default' => 'Выберите город'] + $cities->toArray(), null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('location[actual_address]', 'Адрес факт. проживания:', ['class' => 'control-label']) !!}
                    {!! Form::text('location[actual_address]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('location[residence_city_id]', 'Город прописки:', ['class' => 'control-label']) !!}
                    {!! Form::select('location[residence_city_id]', ['default' => 'Выберите город'] + $cities->toArray(), null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('location[residence_address]', 'Адрес прописки:', ['class' => 'control-label']) !!}
                    {!! Form::text('location[residence_address]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'panel4'))

@section ('panel5_panel_title', 'Социальная информация')
@section ('panel5_panel_body')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-2">
                    {!! Form::label('socialInfo[reservist]', 'Военнообязанный:', ['class' => 'control-label']) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::hidden('socialInfo[reservist]', 0) !!}
                {!! Form::checkbox('socialInfo[reservist]', 1, null) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                {!! Form::label('socialInfo[pensioner]', 'Пенсионер:', ['class' => 'control-label']) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::hidden('socialInfo[pensioner]', 0) !!}
                {!! Form::checkbox('socialInfo[pensioner]', 1, null) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                {!! Form::label('socialInfo[disability_id]', 'Инвалидность:', ['class' => 'control-label']) !!}
            </div>
            <div class="col-lg-3">
                {!! Form::select('socialInfo[disability_id]', $disabilities, null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'panel5'))

@section ('panel6_panel_title', 'Работа')
@section ('panel6_panel_body')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('work[work_place]', 'Место работы:(необяз.)', ['class' => 'control-label']) !!}
                    {!! Form::text('work[work_place]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('work[position]', 'Должность:(необяз.)', ['class' => 'control-label']) !!}
                    {!! Form::text('work[position]', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('work[salary]', 'Ежемесячный доход:(необяз.)', ['class' => 'control-label']) !!}
                    {!! Form::text('work[salary]', null, ['class' => 'form-control', 'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'prefix': 'BYR ', 'placeholder': '0'"]) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'panel6'))

<div class="form-group text-center">
    {!! Form::submit('Отправить', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
