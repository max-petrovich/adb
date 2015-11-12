@extends ('layouts.default')
@section('page_heading','Список кредитов')
@section('section')
    @if(Session::has('transanction_info'))
        <div class="alert alert-success">
            <h5><b>Информация о проведённой бухгалтерской проводке</b></h5>
            <ul>
                @foreach(Session::get('transanction_info') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (count($credits))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер кредита</th>
                <th>Номер контракта</th>
                <th>Клиент</th>
                <th>Тип кредита</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
                <th>Сумма</th>
                <th>Валюта</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($credits as $credit)
                <tr>
                    <td class="text-center"><a href="{{ route('credit.show', $credit->id) }}">{{ $credit->id }}</a></td>
                    <td>{{ $credit->contract_id }}</td>
                    <td><a href="{{ route('credit.show', $credit->id) }}">{{ $credit->user->fio }}</a></td>
                    <td>{{ $credit->type->name }}</td>
                    <td>{{ $credit->date_start }}</td>
                    <td>@if($credit->date_expiration != null) {{ $credit->date_expiration }} @else - @endif</td>
                    <td>{{ number_format($credit->amount, 2) }}
                    <td>{{ trans( 'currency.' . $credit->currency->code) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('widgets.alert', array('class'=>'warning', 'message'=> 'База данных кредитов пуста', 'icon'=> 'user'))
        <div class="row text-center">
                <a href="{{ route('credit.create') }}">@include('widgets.button', array('value'=>'Взять кредит', 'class'=>'primary'))</a>
        </div>
    @endif

@stop
