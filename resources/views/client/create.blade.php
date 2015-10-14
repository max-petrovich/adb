@extends ('layouts.default')
@section('page_heading','Добавить клиента')

@section('section')
    {!! Form::open(['route' => 'client.store', 'id' => 'clientForm']) !!}
    @include('client.partials.form')
@stop