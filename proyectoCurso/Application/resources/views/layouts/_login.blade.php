<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('app/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('app/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Ecolones - @yield('title')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="{{asset('app/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('app/css/light-bootstrap-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('app/css/demo.css')}}" rel="stylesheet" />
</head>
<body>
  <div class="wrapper wrapper-full-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
      <div class="container">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#pablo">Ecolones</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{route('site.index')}}" class="nav-link">
                <i class="nc-icon nc-chart-pie-35"></i> Inicio
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{route('register')}}" class="nav-link">
                <i class="nc-icon nc-badge"></i> Registrarse
              </a>
            </li>
            <li class="nav-item  active ">
              <a href="{{route('login')}}" class="nav-link">
                <i class="nc-icon nc-mobile"></i> Inicio de Sesion
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    @yield('content')}};
    <footer class="footer">
      <div class="container">
        <nav>
          <p class="copyright text-center"> © <script>document.write(new Date().getFullYear())</script><a href="#">MLopez</a>, hecho por una web mas cool
          </p>
        </nav>
      </div>
    </footer>
  </div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('app/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('app/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('app/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('app/js/plugins/bootstrap-notify.js')}}"></script>
<!--  jVector Map  -->
<script src="{{asset('app/js/plugins/jquery-jvectormap.js')}}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('app/js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{asset('app/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  Sweet Alert  -->
<script src="{{asset('app/js/plugins/sweetalert2.min.js')}}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{asset('app/js/plugins/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{asset('app/js/plugins/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{asset('app/js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{asset('app/js/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('app/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{asset('app/js/plugins/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{asset('app/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--  Full Calendar   -->
<script src="{{asset('app/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('app/js/light-bootstrap-dashboard.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('app/js/demo.js')}}"></script>
<script>
$(document).ready(function() {
  demo.checkFullPageBackgroundImage();
  @if (session('msg'))
    @include('layouts._msg')
  @endif
  setTimeout(function() {
    // after 1000 ms we add the class animated to the login/register card
    $('.card').removeClass('card-hidden');
  }, 700)
});
</script>
</html>
