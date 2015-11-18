@extends('atm.layout')

@section('body')
    <h2>Оплата мобильного оператора</h2>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            @include('atm.partials.errors')
            @if (Session::has('status'))
                <div><a href=""><button type="button" class="btn btn-primary getCheckOperation" data-check-operation="Оплата мобильного оператора" data-check-info="{{ Session::get('check-info') }}">Получить чек</button></a></div>
            @else
                {!! Form::open(['route' => 'atm.payment.store', 'id' => 'paymentForm']) !!}
                <div class="form-group">
                    {!! Form::label('operator', 'Оператор:', ['class' => 'control-label']) !!}
                    {!! Form::select('operator', $operators, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group" style="margin-top:10px;">
                    {!! Form::label('phone_number', 'Номер телефона:', ['class' => 'control-label', 'style' => 'color:#fff']) !!}
                    {!! Form::text('phone_number', null, ['class' => 'form-control text-center', 'style' => 'font-size:18px', 'auto-complete' => 'false', 'data-inputmask' => "'mask': '(99) 99-99-999'"]) !!}
                </div>
                <div class="form-group" style="margin-top:10px;">
                    {!! Form::label('sum', 'Сумма:', ['class' => 'control-label', 'style' => 'color:#fff']) !!}
                    {!! Form::text('sum', null, ['class' => 'form-control text-center', 'style' => 'font-size:18px', 'auto-complete' => 'false', 'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'prefix': 'BYR ', 'placeholder': '0'"]) !!}
                </div>
                {!! Form::submit('Оплатить', ['class' => 'btn btn-primary', 'id' => 'payMobile']) !!}
                {!! Form::close() !!}
            @endif

        </div>
    </div>
@stop