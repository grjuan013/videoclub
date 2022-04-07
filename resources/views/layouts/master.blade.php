<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="#">
    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @notifyCss

    <title>Videoclub</title>
</head>

<body>

    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    @notifyJs
    <x:notify-messages />
</body>

</html>
