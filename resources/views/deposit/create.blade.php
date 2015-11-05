@extends ('layouts.default')
@section('page_heading','Добавить вклад')

@section('section')
    {!! Form::open(['route' => 'deposit.store', 'id' => 'depositForm']) !!}
    @include('deposit.partials.form')
@stop