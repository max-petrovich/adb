@extends ('layouts.default')
@section('page_heading','Добавить вклад')

@section('section')
    {!! Form::open(['route' => 'credit.store', 'id' => 'creditForm']) !!}
    @include('credit.partials.form')
@stop