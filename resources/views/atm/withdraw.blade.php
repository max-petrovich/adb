@extends('atm.layout')

@section('body')
    <h2>Снять деньги со счёта</h2>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @include('atm.partials.errors')
            @if (Session::has('status'))
                <div><a href=""><button type="button" class="btn btn-primary getCheckOperation" data-check-operation="Снятие со счёта" data-check-info="{{ Session::get('check-info') }}">Получить чек</button></a></div>
            @else
                {!! Form::open(['route' => 'atm.withdraw.store', 'id' => 'withdrawForm']) !!}
                <div class="form-group" style="margin-top:10px;">
                    {!! Form::label('sum', 'Сумма:', ['class' => 'control-label', 'style' => 'color:#fff']) !!}
                    {!! Form::text('sum', null, ['class' => 'form-control text-center', 'style' => 'font-size:18px', 'auto-complete' => 'false', 'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'prefix': 'BYR ', 'placeholder': '0'"]) !!}
                </div>
                {!! Form::submit('Снять деньги', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            @endif

        </div>
    </div>
@stop