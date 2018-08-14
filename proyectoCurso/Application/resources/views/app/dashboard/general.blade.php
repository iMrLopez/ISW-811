@extends('layouts._app')
@section('title',"Home")
@section('content')
<div class="row">
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-chart text-warning"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Tipos de materiales</p>
              <h4 class="card-title">150GB</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i> Todos estos materiales recibimos!
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-light-3 text-success"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Productos Registrados</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i> Hace 5 segundos
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-vector text-danger"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Centros de canje disponibles</p>
              <h4 class="card-title">23</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-clock-o"></i> Una familia enorme!
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-favourite-28 text-primary"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Litros de oxigeno salvados</p>
              <h4 class="card-title">+45K</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i> Juntos!
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">Que son los Ecolones? </h4>
        <p class="card-category"></p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <video id="video" loop autoplay style='width:100%' src="{{ asset('site/video/inicio.mp4') }}"></video>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="now-ui-icons loader_refresh spin"></i> Actualizado hace 3 minutos
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card  card-tasks">
      <div class="card-header ">
        <h4 class="card-title">Estadisticas mundiales</h4>
        <p class="card-category">Las ultimas mundiales de produccion de energia!</p>
      </div>
      <div class="card-body ">
        <div style="text-align:center">
          <script type="text/javascript" src="https://oilprice.com/widgets/energyproduction.js"></script><noscript><!--Please Enable Javascript for this <a href="https://oilprice.com/">Oil Price</a> widget to work--></noscript>
          <script type="text/javascript" src="https://oilprice.com/widgets/alternateenergy.js"></script><noscript><!--Please Enable Javascript for this <a href="https://oilprice.com/">Oil Price</a> widget to work--></noscript>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="now-ui-icons loader_refresh spin"></i> EN TIEMPO REAL
        </div>
      </div>
    </div>
  </div>
</div>
@endsection()
