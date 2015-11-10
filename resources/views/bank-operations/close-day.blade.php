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
            <h5><b>Начисление процентов на процентные счета клиентов</b></h5>
            <ul>
                @foreach(Session::get('deposit_percents_message') as $account_id=>$sum)
                    <li>На счёт {{ $account_id }} начислена сумма {{ $sum }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@stop
