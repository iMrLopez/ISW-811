<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="theme-color" content="#2196F3">
  <title>Ecolones</title>

  <!-- CSS  -->
  <link href="{{ asset('site/min/plugin-min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('site/min/custom-min.css') }}" type="text/css" rel="stylesheet" >
</head>
<body id="top" class="scrollspy">

  <!-- Pre Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

  </div>

  <!--Navigation-->
  <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
      <div class="container">
        <div class="nav-wrapper">
          <a href="#" id="logo-container" class="brand-logo">Ecolones!</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#valores">Valores</a></li>
            <li><a href="#proposito">Proposito</a></li>
            <li><a href="#marcas">Marcas</a></li>
            <li><a href="#contacto">Contacto</a></li>
            <li><div class="text-align: right;"><a class="btn waves-effect waves-light red darken-1" href="{{ route('mainAppRoute') }}">Ingresa en tu perfil</a></div></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
      </div>
    </nav>
  </div>

  <!--Hero-->
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <video id="video" loop no-controls autoplay style="height:100%; width:100%; object-fit: cover; z-index: 0;position: absolute; top: 0; left:0;" src="{{ asset('site/video/inicio.mp4') }}">
        <h1 class="text_h center header cd-headline letters type">
          <span>Nos encanta</span>
          <span class="cd-words-wrapper waiting">
            <b class="is-visible">El ambiente</b>
            <b>Reciclar</b>
            <b>Nuestro Futuro</b>
          </span>
        </h1>
      </video>
    </div>
    <script>
    document.getElementById('video').play();
    </script>
  </div>

  <!--Valores-->
  <div id="valores" class="section scrollspy">
    <div class="container">
      <div class="row">
        <div  class="col s12">
          <h2 class="center header text_h2"> La unica moneda que te  <span class="span_h2"> Premia  </span> por algo tan simple como <span class="span_h2"> reciclar!</span> </h2>
        </div>

        <div  class="col s12 m4 l4">
          <div class="center promo promo-example">
            <i class="mdi-image-flash-on"></i>
            <h5 class="promo-caption">Cuida!</h5>
            <p class="light center">"La basura al basurero"? NO!, mejor deci "La basura al centro de acopio".</p>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="center promo promo-example">
            <i class="mdi-social-group"></i>
            <h5 class="promo-caption">Comunica!</h5>
            <p class="light center">Corre la voz!, contale a tus amigos y mejora el mundo.</p>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="center promo promo-example">
            <i class="mdi-hardware-desktop-windows"></i>
            <h5 class="promo-caption">Gana!</h5>
            <p class="light center">Realiza tus compras en nuestro sistema en línea accesible y seguro, o con tu ecotarjeta.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Proposito -->
  <div id="proposito" class="section scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/project1.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">Nuestro propósito <i class="mdi-navigation-more-vert right"></i></span>
              <!-- <p><a href="#">Project link</a></p> -->
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Nuestro propósito <i class="mdi-navigation-close right"></i></span>
              <ul>
                <li>Impulsar una economía responsable y solidaria en Costa Rica, de participación, alianzas y responsabilidad compartida.</li>
                <li>ecolones representa una gran alianza público privada que se lanza en el marco de la Estrategia Nacional de Separación, Recuperación y Valorización de Residuos (ENSRVR) 2016-2021, reúne al Ministerio de Salud y la empresa Próxima Comunicación, como dueño de la propiedad intelectual, según acuerdo DM-JG-1731-2017.</li>
                <li>Incluye a consumidores, centros de acopio, municipalidades, organizaciones y empresas privadas, para que según su participación en el ciclo económico, asuman su responsabilidad en la gestión integral de los residuos..</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/project1.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">Nuestro propósito <i class="mdi-navigation-more-vert right"></i></span>
              <!-- <p><a href="#">Project link</a></p> -->
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Nuestro propósito <i class="mdi-navigation-close right"></i></span>
              <ul>
                <li>Impulsar una economía responsable y solidaria en Costa Rica, de participación, alianzas y responsabilidad compartida.</li>
                <li>ecolones representa una gran alianza público privada que se lanza en el marco de la Estrategia Nacional de Separación, Recuperación y Valorización de Residuos (ENSRVR) 2016-2021, reúne al Ministerio de Salud y la empresa Próxima Comunicación, como dueño de la propiedad intelectual, según acuerdo DM-JG-1731-2017.</li>
                <li>Incluye a consumidores, centros de acopio, municipalidades, organizaciones y empresas privadas, para que según su participación en el ciclo económico, asuman su responsabilidad en la gestión integral de los residuos..</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="img/project1.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">Nuestro propósito <i class="mdi-navigation-more-vert right"></i></span>
              <!-- <p><a href="#">Project link</a></p> -->
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Nuestro propósito <i class="mdi-navigation-close right"></i></span>
              <ul>
                <li>Impulsar una economía responsable y solidaria en Costa Rica, de participación, alianzas y responsabilidad compartida.</li>
                <li>ecolones representa una gran alianza público privada que se lanza en el marco de la Estrategia Nacional de Separación, Recuperación y Valorización de Residuos (ENSRVR) 2016-2021, reúne al Ministerio de Salud y la empresa Próxima Comunicación, como dueño de la propiedad intelectual, según acuerdo DM-JG-1731-2017.</li>
                <li>Incluye a consumidores, centros de acopio, municipalidades, organizaciones y empresas privadas, para que según su participación en el ciclo económico, asuman su responsabilidad en la gestión integral de los residuos..</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Marcas-->
<div class="section scrollspy" id="marcas">
  <div class="container">
    <h2 class="header text_b">Marcas patrocinadoras </h2>
    <div class="row">
      <p>Aqui van las marcas patrocinadoras</p>
    </div>
  </div>
</div>

<!--Parallax-->
<div class="parallax-container">
  <div class="parallax"><img src="{{ asset('site/img/parallax1.png') }}"></div>
</div>

<!--Team-->

<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <form class="col s12" action="contact.php" method="post">
          <div class="row">
            <div class="input-field col s6">
              <i class="mdi-action-account-circle prefix white-text"></i>
              <input id="icon_prefix" name="name" type="text" class="validate white-text">
              <label for="icon_prefix" class="white-text">Tu Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-communication-email prefix white-text"></i>
              <input id="icon_email" name="email" type="email" class="validate white-text">
              <label for="icon_email" class="white-text">Tu Correo</label>
            </div>
            <div class="input-field col s12">
              <i class="mdi-editor-mode-edit prefix white-text"></i>
              <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
              <label for="icon_prefix2" class="white-text">Tu Mensaje</label>
            </div>
            <div class="col offset-s7 s5">
              <button class="btn waves-effect waves-light red darken-1" type="submit">Enviar
                <i class="mdi-content-send right white-text"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <<div class="col l3 s12">
        <h5 class="white-text">Ecolones</h5>
        <ul>
          <li><a class="white-text" href="#">Inicio</a></li>
          <li><a class="white-text" href="./app">Aplicacion</a></li>
        </ul>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Redes Sociales</h5>
        <ul>
          <li>
            <a class="white-text" href="https://www.instagram.com/ecolones/">
              <i class="small fa fa-instagram-square white-text"></i> Insta ecologico ;)
            </a>
          </li>
          <li>
            <a class="white-text" href="https://www.facebook.com/ecolones">
              <i class="small fa fa-facebook-square white-text"></i> Facebook Ecologico ;)
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright default_color">
    <div class="container">
      Creado por <a class="white-text" href="mlopezitsolutions.com">MLopez</a>.
    </div>
  </div>
</footer>
<!--  Scripts-->
<script src="{{ asset('site/min/plugin-min.js') }}"></script>
<script src="{{ asset('site/min/custom-min.js') }}"></script>

</body>
</html>
