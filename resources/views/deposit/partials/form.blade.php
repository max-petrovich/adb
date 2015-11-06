{!! Html::script('vendor/jsvalidation/js/jquery.validate.min.js') !!}
{!! Html::script('vendor/jsvalidation/js/jsvalidation.min.js') !!}

{!! JsValidator::formRequest(\App\Http\Requests\StoreDepositRequest::class, '#depositForm') !!}

{!! Html::script('vendor/moment/moment.js') !!}

{!! Html::script('js/deposit.js') !!}

@include('deposit.partials.errors')

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

<div class="form-horizontal">

    <div class="form-group">
        {!! Form::label('contract_number', 'Номер договора', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::number('contract_number', 1, ['class' => 'form-control', 'min' => 1]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('user_id', 'Клиент', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('user_id', [null] + $users->toArray(), null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Выберите клиента']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('deposit_type_id', 'Тип депозита', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::select('deposit_type_id', [null] + $deposit_type->toArray(), null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Выберите тип депозита']) !!}
        </div>
    </div>


    <div class="form-group" id="deposit_rate_block" style="display:none;">
        {!! Form::label('deposit_rate_id', 'Депозитная линия', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::select('deposit_rate_id', [null], null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Выберите депозитную линию']) !!}
        </div>
    </div>

    <div id="deposit_info_data" style="display: none;">
        <div class="alert alert-info" style="padding:15px 0 5px; margin-bottom:10px;">
            <h4 class="text-center">Информация о депозитной линии:</h4>
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

            <div id="deposit_type_2">
                <div class="form-group">
                    {!! Form::label('date_expiration', 'Дата окончания', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-2">
                        {!! Form::date('date_expiration', null, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('contract_term', 'Срок договора (дней)', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-2">
                        {!! Form::number('contract_term', null, ['class' => 'form-control', 'min' => 0, 'readonly']) !!}
                    </div>
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
            <div class="col-sm-2">
                {!! Form::number('amount', null, ['class' => 'form-control', 'min' => 0]) !!}
            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Отправить', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


</div>