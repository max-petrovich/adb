@extends('atm.layout')

@section('body')
<h2>Выберите операцию:</h2>
<div class="row">
    <div class="text-center col-md-8 col-md-offset-2">
        <ul class="main-screen-menu">
            @foreach($menu as $menu_item)
                <li><a href="{{ action($menu_item['action']) }}"><button type="button" class="btn btn-{{ $menu_item['btn-status'] or 'warning' }} btn-lg">{{ $menu_item['title'] }}</button></a></li>
            @endforeach
        </ul>
    </div>
</div>
@stop

