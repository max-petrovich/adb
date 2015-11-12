@extends ('layouts.default')
@section('page_heading','Закрытие банковского дня')
@section('section')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @if(Session::has('deposit_percents_message'))
        <div class="alert alert-success">
            <h5><b>Начисление процентов по депозитам на процентные счета клиентов</b></h5>
            <ul>
                @foreach(Session::get('deposit_percents_message') as $account_id=>$sum)
                    <li>На счёт {{ $account_id }} начислена сумма {{ number_format($sum, 2) }} (BYR)</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-warning">
            Нет активных вкладов
        </div>
    @endif

    @if(Session::has('credit_percents_message'))
        <div class="alert alert-success">
            <h5><b>Получение процентов по кредитам</b></h5>
            <ul>
                @foreach(Session::get('credit_percents_message') as $account_id=>$sum)
                    <li>На счёт {{ $account_id }} начислена сумма {{ number_format($sum, 2) }} (BYR)</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-warning">
            Нет активных кредитов
        </div>
    @endif

@stop
