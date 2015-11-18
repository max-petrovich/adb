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

    {!! Html::script('js/main.js') !!}
    {!! Html::style('/css/atm.css') !!}
    <script>
        var web_root = '{{ url('atm') }}';
    </script>
</head>
<body>



<div class="container container-table">
    <div class="row vertical-center-row">
        <div class="text-center col-md-8 col-md-offset-2 atm-container" style="background: url('/img/ic_bg.png') repeat; border-radius:3px; box-shadow: 0 0 30px black; min-height:600px; padding:20px 0 20px;">
            @yield('body')
            @if ( Route::current()->uri() != 'atm' )
            <div style="margin-top:30px;"><a href="{{ action('ATM\AtmController@getIndex') }}"><button type="button" class="btn btn-warning btn-lg">В главное меню</button></a></div>
            @endif
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="checkModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

</body>
</html>