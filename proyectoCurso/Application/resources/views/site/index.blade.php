<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Ecolones</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('site/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ asset('site/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  @guest
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img style='width:30%' src="{{ asset('site/img/logo.png') }}"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('login') }}" class="btn-large waves-effect waves-light orange lighten-1">Ingresar a Mi Perfil</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="{{ route('login') }}" class="btn-large waves-effect waves-light orange lighten-1">Ingresar a Mi Perfil</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  @else
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img style='width:30%' src="{{ asset('site/img/logo.png') }}"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('app.appEco') }}" class="btn-large waves-effect waves-light orange lighten-1">Volver a Mi Perfil</a></li>
      </ul>
    </div>
  </nav>
@endguest
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot" style="padding-top: 0px;">
    <div class="container">
      <div class="row center" style="margin-top: 20px;">
        <video id="video-player-6" data-id="6" poster="" preload="auto" controls="controls" autoplay style="width: 50%; box-shadow: 0 4px 8px 0 #0000ff, 0 6px 20px 0 #0000ff;">
          <source type="video/mp4" src="{{ asset('site/video/inicio.mp4') }}">
          </video>
        </div>
  </div>
</div>
<div class="parallax"><img src="{{ asset('site/img/background1.jpg') }}" alt="Unsplashed background img 1"></div>
</div>
<!--   Icon Section   -->
<div class="container">
  <div class="section">

    <div class="row">
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="material-icons">autorenew</i></h2>
          <h5 class="center">Incremento en el volumen de material limpio y separado.</h5>
          <!-- <p class="light"></p> -->
        </div>
      </div>

      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="material-icons">bubble_chart</i></h2>
          <h5 class="center">Mas comunicacion y educacion para mejorar el consumo.</h5>
          <!-- <p class="light"></p> -->
        </div>
      </div>

      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="material-icons">shopping_cart</i></h2>
          <h5 class="center">Sistema en linea para realizar el canjeo de tus ecolones.</h5>
          <!-- <p class="light"></p> -->
        </div>
      </div>
    </div>
  </div>
</div>

<div class="parallax-container valign-wrapper">
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">Porque cuidar el ambiente es chido! </h5>
      </div>
    </div>
  </div>
  <div class="parallax"><img src="{{ asset('site/img/background2.jpg') }}" alt="Unsplashed background img 2"></div>
</div>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12 center">
        <h3><i class="mdi-content-send brown-text"></i></h3>
        <h4>Materiales que recibimos</h4>
        <p class="left-align light">Todos estos materiales recibimos en cualquiera de nuestros centros de recoleccion, que esperas para visitarnos y ayudar al ambiente?</p>
      </div>
    </div>
    <div class="row">
      @foreach($materialMaster as $actual)
      <div class="col s6 m4">
        <div class="card" style="box-shadow: 0 4px 8px 0 {{$actual->HTMLColor}}, 0 6px 20px 0 {{$actual->HTMLColor}};">
          <div class="card-image">
            <img src="{{$actual->img}}">
            <span class="card-title" style="text-shadow: 0 0 3px #FF0000, 0 0 5px {{$actual->HTMLColor}}">{{$actual->name}}</span>
          </div>
    </div>
  </div>
  @endforeach
</div>
</div>
</div>

<div class="parallax-container valign-wrapper">
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">Costa Rica es el unico pais con una moneda eco amigable</h5>
      </div>
    </div>
  </div>
  <div class="parallax"><img src="{{ asset('site/img/background3.jpg') }}" alt="Unsplashed background img 3"></div>
</div>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12 center">
        <h3><i class="mdi-content-send brown-text"></i></h3>
        <h4>Nuestros puntos de recoleccion</h4>
        <p class="left-align light">Estamos ubicados en todo el pais!, abajo puedes visualizar todos nuestros puntos de recoleccion! ;)</p>
      </div>
    </div>
    <div class="row">
      @foreach($collCntrMaster as $actual)
      <div class="col s6 m4">
        <div class="card horizontal">
          <div class="card-stacked">
            <div class="card-content">
              <p>Punto de recoleccion: <b>{{$actual->name}}</b>.</p>
              <p>Direccion exacta: <b>{{$actual->address}}, {{$actual->province_master->name}}</b>.</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<div class="parallax-container valign-wrapper">
  <div class="section no-pad-bot">
    <div class="container">
  </div>
</div>
<div class="parallax"><img src="{{ asset('site/img/background4.jpg') }}" alt="Unsplashed background img 3"></div>
</div>

<footer class="page-footer teal">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Nuestro propósito</h5>
        <p class="grey-text text-lighten-4">Impulsar una economía responsable y solidaria en Costa Rica, de participación, alianzas y responsabilidad compartida.</p>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Nuestra propuesta</h5>
        <p class="grey-text text-lighten-4">Los materiales reciclables,  ahora tienen + valor.</p>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Nuestro apoyo</h5>
        <p class="grey-text text-lighten-4">Apoyar el cumplimiento de la Ley 8839 de Gestión Integral de Residuos en Costa Rica y a los objetivos del desarrollo sostenible en el mundo.</p>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      Realizado por: <a class="brown-text text-lighten-3" href="http://mlopezitsolutions.com">Marny Lopez Lopez</a>
    </div>
  </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('site/js/materialize.js') }}"></script>
<script src="{{ asset('site/js/init.js') }}"></script>

</body>
</html>
