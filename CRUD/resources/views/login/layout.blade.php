<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Registrarion and Login')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  </head>
  <body>
    @include('include.header')
    @yield('content')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  </body>
</html>