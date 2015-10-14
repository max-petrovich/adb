@extends ('layouts.default')
@section('page_heading','Список клиентов')
@section('section')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    @if (count($clients))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Пол</th>
                <th>E-Mail</th>
                <th>Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td><a href="{{ route('client.show', $client->id) }}">{{ $client->id }}</a></td>
                    <td><a href="{{ route('client.show', $client->id) }}">{{ $client->getFIO() }}</a></td>
                    <td>{{ trans('sex.' . $client->sex) }}</td>
                    <td>{{ $client->contacts->email }}</td>
                    <td>
                        <a href="{{ route('client.edit', $client->id) }}" title="Редактировать"><button type="submit" class="btn btn-link fa fa-edit"></button></a>
                        {!! Form::open(array('route' => ['client.destroy', $client->id], 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-link fa fa-trash-o confirmDeleteClient"></button>
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        @include('widgets.alert', array('class'=>'warning', 'message'=> 'База данных клиентов пуста', 'icon'=> 'user'))
        <div class="row text-center">
                <a href="{{ route('client.create') }}">@include('widgets.button', array('value'=>'Добавить клиента', 'class'=>'primary'))</a>
        </div>
    @endif

@stop
