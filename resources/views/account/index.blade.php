@extends ('layouts.default')
@section('page_heading','Список счетов')
@section('section')
    @if (count($accounts))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер счёта</th>
                <th>План счетов</th>
                <th>Наименование</th>
                <th>Тип счёта</th>
                <th>Держатель счета</th>
                <th>Валюта</th>
                <th>Дебет</th>
                <th>Кредит</th>
                <!--<th>Сальдо</th>-->
            </tr>
            </thead>
            <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->id }}</td>
                    <td class="text-center">{{ $account->chart->id }}</td>
                    <td>@if ($account->deposits()->first()) <a href="{{ route('deposit.show', $account->deposits()->first()->pivot->deposit_id) }}">Депозит<br/>{{ $account->deposits()->first()->rate->name }}</a>
                        @elseif ($account->credits()->first()) <a href="{{ route('credit.show', $account->credits()->first()->pivot->credit_id) }}">Кредит<br/>{{ $account->credits()->first()->rate->name }}</a>
                        @else {{ $account->chart->name }} @endif</td>
                    <td>@if ($account->user != null) {{ trans('all.account_type_'.$account->type_id) }} @endif</td>
                    <td>@if ($account->user == null) {{ trans('all.bank') }} @else <a href="{{ route('client.show', $account->user->id) }}">{{ $account->user->fio }}</a> @endif</td>
                    <td>{{ trans( 'currency.' . $account->currency->code) }}</td>
                    <td>{{ number_format($account->debit, 2) }}</td>
                    <td>{{ number_format($account->credit, 2) }}</td>
                    <!--<td>{{ number_format($account->balances, 2) }}</td>-->
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('widgets.alert', array('class'=>'warning', 'message'=> 'База данных счетов пуста', 'icon'=> 'money'))
    @endif

@stop