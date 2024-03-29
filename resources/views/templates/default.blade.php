<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>3D Modeling</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div>
    @include('templates.partials.navigation')
    <div class="content">
        @include('templates.partials.alerts')
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
