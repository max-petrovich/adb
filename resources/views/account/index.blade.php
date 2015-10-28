@extends ('layouts.default')
@section('page_heading','Список счетов')
@section('section')
    @if (count($accounts))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер счёта</th>
                <th>План счетов</th>
                <th>Держатель счета</th>
                <th>Валюта</th>
                <th>Дебет</th>
                <th>Кредит</th>
                <th>Сальдо</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->id }}</td>
                    <td>{{ $account->chart->id }}</td>
                    <td>@if ($account->user == null) {{ trans('all.bank') }} @else <a href="{{ route('client.show', $account->user->id) }}">{{ $account->user->getFIO() }}</a> @endif</td>
                    <td>{{ trans( 'currency.' . $account->currency->code) }}</td>
                    <td>{{ $account->debit }}</td>
                    <td>{{ $account->credit }}</td>
                    <td>{{ $account->balances }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('widgets.alert', array('class'=>'warning', 'message'=> 'База данных счетов пуста', 'icon'=> 'money'))
    @endif

@stop
