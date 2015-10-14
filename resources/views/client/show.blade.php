@extends ('layouts.default')
@section('page_heading','Информация о клиенте')

@section('section')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-12 col-lg-12 ">
                                <h5><b>Основная информация</b></h5>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Фамилия:</td>
                                        <td>{{ $client->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Имя:</td>
                                        <td>{{ $client->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Отчество</td>
                                        <td>{{ $client->middle_name }}</td>
                                    </tr>

                                    <tr>
                                        <td>Дата рождения:</td>
                                        <td>{{ $client->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Пол:</td>
                                        <td>{{ trans('sex.' . $client->sex) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Семейное положение:</td>
                                        <td>{{ $marital_statuses[$client->marital_status_id] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Гражданство:</td>
                                        <td>{{ $nationalities[$client->nationality_id] }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5><b>Контакты</b></h5>
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $client->contacts->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Домашний телефон:</td>
                                            <td>{{ $client->contacts->phone_home }}</td>
                                        </tr>
                                        <tr>
                                            <td>Мобильный телефон:</td>
                                            <td>{{ $client->contacts->phone_mobile }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5><b>Паспортные данные</b></h5>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Серия:</td>
                                        <td>{{ $client->passport->series }}</td>
                                    </tr>
                                    <tr>
                                        <td>Номер:</td>
                                        <td>{{ $client->passport->number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Идентификационный номер:</td>
                                        <td>{{ $client->passport->passport_id }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5><b>Города и прописка</b></h5>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Место рождения:</td>
                                        <td>{{ $client->location->birth_place }}</td>
                                    </tr>
                                    <tr>
                                        <td>Город факт. проживания:</td>
                                        <td>{{ $cities[$client->location->actual_city_id] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес факт. проживания:</td>
                                        <td>{{ $client->location->actual_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Город прописки:</td>
                                        <td>{{ $cities[$client->location->residence_city_id] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес прописки:</td>
                                        <td>{{ $client->location->residence_address }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5><b>Социальная информация</b></h5>
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Военнообязанный:</td>
                                            <td>@if ($client->socialInfo->reservist) {{ trans('all.yes') }} @else {{ trans('all.no') }} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Пенсионер:</td>
                                            <td>@if ($client->socialInfo->pensioner) {{ trans('all.yes') }} @else {{ trans('all.no') }} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Инвалидность:</td>
                                            <td>{{ $disabilities[$client->socialInfo->disability_id] }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5><b>Работа</b></h5>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Место работы:</td>
                                        <td>{{ $client->work->work_place }}</td>
                                    </tr>
                                    <tr>
                                        <td>Должность:</td>
                                        <td>{{ $client->work->position }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ежемесячный доход (BYR):</td>
                                        <td>{{ $client->work->salary }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="pull-right">
                            <a href="{{ route('client.edit', $client->id) }}" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::open(array('route' => ['client.destroy', $client->id], 'method' => 'delete', 'style' => 'display:inline;')) !!}
                            <button type="submit" class="btn btn-sm btn-danger confirmDeleteClient"><i class="glyphicon glyphicon-remove"></i></button>
                            {!! Form::close() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop
