<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Broadcast Redis Socket io Tutorial - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Broadcasting events</h1>

    <div id="notification"></div>
</div>
</body>

<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>

<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">
    let test = window.Echo.channel('user-channel');
    let i = 0;
        test.listen('.UserEvent', function (data){
            i++;
            console.log(data);
            jQuery('.container').append("<p>Public event no:<b>"+i+"</b>  "+data.time+"<p>");
        });

</script>
</html>
