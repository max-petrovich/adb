@extends('atm.layout')

@section('body')
    <h2>Текущее состояние счёта</h2>
    <div class="row">
        <div class="text-center col-md-8 col-md-offset-2">
            <div class="alert alert-info" role="alert">{{ number_format($account->debit, 2) }} (BYR)</div>
        </div>
    </div>

    <div><a href=""><button type="button" class="btn btn-primary getCheckOperation" data-check-operation="Состояние счёта" data-check-info="{{ number_format($account->debit, 2) }} (BYR)">Получить чек</button></a></div>
@stop