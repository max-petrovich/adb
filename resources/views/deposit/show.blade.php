@extends ('layouts.default')
@section('page_heading','Информация о вкладе')

@section('section')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 ">
                                <h4><b>Вклад № {{ $deposit->id }}</b></h4>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Номер котракта:</td>
                                        <td>{{ $deposit->contract_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Клиент:</td>
                                        <td><a href="{{ route('client.show', $deposit->user->id) }}">{{ $deposit->user->fio }}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Валюта:</td>
                                        <td>{{ trans( 'currency.' . $deposit->currency->code) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Тип:</td>
                                        <td>{{ $deposit->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата начала:</td>
                                        <td>{{ $deposit->date_start }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата окончания:</td>
                                        <td>@if($deposit->date_expiration != null) {{ $deposit->date_expiration }} @else - @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Сумма:</td>
                                        <td>{{ number_format($deposit->amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Депозитная линиия:</td>
                                        <td>{{ $deposit->rate->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Процент по вкладу (%):</td>
                                        <td>{{ $deposit->rate->interest_rate }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h4><b>Счета для вклада</b></h4>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Основной:</td>
                                        <td>{{ $deposit->accounts()->where('type_id', 1)->first()->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Процентный:</td>
                                        <td>{{ $deposit->accounts()->where('type_id', 2)->first()->id }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="pull-right">
                            {!! Form::open(array('route' => ['deposit.destroy', $deposit->id], 'method' => 'delete', 'style' => 'display:inline;')) !!}
                            <button type="submit" class="btn btn-sm btn-danger confirmDeleteClient">Закрыть вклад</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop
