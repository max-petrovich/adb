@extends ('layouts.default')
@section('page_heading','Редактирование информации клиента')

@section('section')
    {!! Form::model($client, ['method' => 'PATCH', 'route' => ['client.update', $client->id], 'id' => 'depositForm']) !!}
    @include('client.partials.form')
@stop