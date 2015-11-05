<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>АДБ</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>

	{!! Html::style('assets/stylesheets/styles.css') !!}

	{!! Html::script('js/jquery-2.1.4.min.js') !!}
	{!! Html::script('assets/scripts/frontend.js') !!}
	{!! Html::script('assets/inputmask/inputmask.js') !!}

	<!-- Chosen -->
	{!! Html::style('vendor/chosen/chosen.min.css') !!}
	{!! Html::script('vendor/chosen/chosen.jquery.min.js') !!}

	{!! Html::script('js/main.js') !!}
	<script>
		var web_root = '{{ url('') }}';
	</script>
</head>
<body>
	@yield('body')
</body>
</html>