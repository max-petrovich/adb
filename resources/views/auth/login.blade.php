@extends('auth/layout')
{!! Html::style('/css/auth.css') !!}

@section('content')
	<div class="container container-table">
		<div class="row vertical-center-row">
			<div class="text-center col-md-6 col-md-offset-3" style="background: url('/img/ic_bg.png') repeat-y; border-radius:3px; box-shadow: 0 0 30px black; padding-top:20px;">
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							<p>{!! $error !!}</p>
						@endforeach
					</div>
				@endif

				@if(Session::has('card_number'))
					{!! Form::open(['action' => 'Auth\AuthController@postLogin', 'id' => 'authForm']) !!}
					<span class="label label-primary">Карта: {{ Session::get('card_number') }} <a href="{{ url('auth/resetCard') }}" ><i class="fa fa-close"></i></a></span>
					{!! Form::hidden('id', Session::get('card_number')) !!}
					<div class="form-group" style="margin-top:10px;">
						{!! Form::label('password', 'Пожалуйста, введите PIN-код', ['class' => 'control-label', 'style' => 'color:#fff']) !!}
						{!! Form::text('password', null, ['class' => 'form-control text-center', 'style' => 'font-size:18px', 'data-inputmask-mask' => "9999"]) !!}
					</div>
					{!! Form::submit('Авторизировать карту', ['class' => 'btn btn-warning']) !!}
					{!! Form::close() !!}
				@else
						{!! Form::open(['action' => 'Auth\AuthController@postCardNumber', 'id' => 'authForm']) !!}
						<div class="form-group" style="margin-top:10px;">
							{!! Form::label('card_number', 'Пожалуйста, введите номер карты', ['class' => 'control-label', 'style' => 'color:#fff']) !!}
							{!! Form::text('card_number', null, ['class' => 'form-control text-center', 'style' => 'font-size:18px', 'auto-complete' => 'false', 'data-inputmask-mask' => "9999 - 9999 - 9999 - 9999"]) !!}
						</div>
						{!! Form::submit('Вставить карту', ['class' => 'btn btn-warning']) !!}
						<div style="margin: 20px;"><img src="/img/insert_card.png" /></div>
						{!! Form::close() !!}
				@endif

			</div>
		</div>
	</div>

@endsection
