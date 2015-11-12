@extends ('layouts.default')
@section('page_heading','Информация о кредите')

@section('section')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 ">
                                <h4><b>Кредит № {{ $credit->id }}</b></h4>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Номер котракта:</td>
                                        <td>{{ $credit->contract_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Клиент:</td>
                                        <td><a href="{{ route('client.show', $credit->user->id) }}">{{ $credit->user->fio }}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Валюта:</td>
                                        <td>{{ trans( 'currency.' . $credit->currency->code) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Тип:</td>
                                        <td>{{ $credit->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата начала:</td>
                                        <td>{{ $credit->date_start }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата окончания:</td>
                                        <td>@if($credit->date_expiration != null) {{ $credit->date_expiration }} @else - @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Сумма:</td>
                                        <td>{{ number_format($credit->amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Депозитная линиия:</td>
                                        <td>{{ $credit->rate->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Процент по вкладу (%):</td>
                                        <td>{{ $credit->rate->interest_rate }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h4><b>Счета для кредита</b></h4>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Основной:</td>
                                        <td>{{ $credit->accounts()->where('type_id', 1)->first()->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Процентный:</td>
                                        <td>{{ $credit->accounts()->where('type_id', 2)->first()->id }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop
