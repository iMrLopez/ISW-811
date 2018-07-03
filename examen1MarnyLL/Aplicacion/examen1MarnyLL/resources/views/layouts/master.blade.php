<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Helado</title>
      <script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('contenido')
</div>
<div class="navbar navbar-expand-lg navbar-dark bg-dark">
  Marni Andrei Lopez Lopez - 1 1623 0677
</div>
</body>
</html>
