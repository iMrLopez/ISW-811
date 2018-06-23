<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Propiedades - @yield('titulo') </title>
      <script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />
</head>
<body>
@include('partials.header')
<div class="container">
      @yield('contenido')
</div>
<footer class="footer navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <span class="text-warning"><strong>Marny Andrey Lopez Lopez - 1 1623 0677</strong></span>
      </div>
</footer>
</body>
</html>
