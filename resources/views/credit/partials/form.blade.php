{!! Html::script('vendor/jsvalidation/js/jquery.validate.min.js') !!}
{!! Html::script('vendor/jsvalidation/js/jsvalidation.min.js') !!}

{!! JsValidator::formRequest(\App\Http\Requests\StoreCreditRequest::class, '#creditForm') !!}

{!! Html::script('vendor/moment/moment.js') !!}

{!! Html::script('js/credit.js') !!}

@include('credit.partials.errors')

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

<div class="form-horizontal">

    <div class="form-group">
        {!! Form::label('user_id', 'Клиент', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('user_id', [null] + $users->toArray(), null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Выберите клиента']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('credit_type_id', 'Тип кредита', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::select('credit_type_id', [null] + $credit_type->toArray(), null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Выберите тип кредита']) !!}
        </div>
    </div>


    <div class="form-group" id="credit_rate_block" style="display:none;">
        {!! Form::label('credit_rate_id', 'Кредитная линия', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::select('credit_rate_id', [null], null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Выберите кредитную линию']) !!}
        </div>
    </div>

    <div id="credit_info_data" style="display: none;">
        <div class="alert alert-info" style="padding:15px 0 5px; margin-bottom:10px;">
            <h4 class="text-center">Информация о кредитной линии:</h4>
            <div class="form-group">
                {!! Form::label('currency_code', 'Валюта', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('currency_code', $currency, null, ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_start', 'Дата начала', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::date('date_start', \Carbon\Carbon::now(), ['class' => 'form-control', 'min' => \Carbon\Carbon::now()->format('Y-m-d')]) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_expiration', 'Дата окончания', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::date('date_expiration', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('contract_term', 'Срок договора (месяцев)', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::number('contract_term', null, ['class' => 'form-control', 'min' => 0, 'readonly']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('interest_rate', 'Процентная ставка (%)', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::number('interest_rate', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

        </div>

        <div class="form-group">
            {!! Form::label('amount', 'Сумма', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::text('amount', null, ['class' => 'form-control', 'min' => 0, 'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'placeholder': '0'"]) !!}
            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Отправить', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


</div>