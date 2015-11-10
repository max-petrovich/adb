@extends ('layouts.default')
@section('page_heading','Список вкладов')
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

    @if (count($deposits))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер вклада</th>
                <th>Номер контракта</th>
                <th>Клиент</th>
                <th>Тип вклада</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
                <th>Сумма</th>
                <th>Валюта</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($deposits as $deposit)
                <tr>
                    <td class="text-center"><a href="{{ route('deposit.show', $deposit->id) }}">{{ $deposit->id }}</a></td>
                    <td>{{ $deposit->contract_id }}</td>
                    <td><a href="{{ route('deposit.show', $deposit->id) }}">{{ $deposit->user->fio }}</a></td>
                    <td>{{ $deposit->type->name }}</td>
                    <td>{{ $deposit->date_start }}</td>
                    <td>@if($deposit->date_expiration != null) {{ $deposit->date_expiration }} @else - @endif</td>
                    <td>{{ number_format($deposit->amount, 2) }}
                    <td>{{ trans( 'currency.' . $deposit->currency->code) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('widgets.alert', array('class'=>'warning', 'message'=> 'База данных вкладов пуста', 'icon'=> 'user'))
        <div class="row text-center">
                <a href="{{ route('deposit.create') }}">@include('widgets.button', array('value'=>'Открыть вклад', 'class'=>'primary'))</a>
        </div>
    @endif

@stop
