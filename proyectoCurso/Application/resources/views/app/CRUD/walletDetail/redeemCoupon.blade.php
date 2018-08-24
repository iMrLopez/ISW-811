@extends('layouts._app')
@section('title',"Home")
@section('content')
<script src="{{asset('app/js/plugins/qrcode.js')}}" type="text/javascript"></script>
<script src="{{asset('app/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">

function getCouponInfo(){
  var field_coupon = document.getElementById('coupon');
  //TODO get the info of this coupon
}


</script>
<div class="row">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Canjear cupones</h4>
            <h5 class="card-title">Escanea el cupon en la casilla de abajo</h4>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-12 pr-12">
                  <div class="form-group">
                    <input type="password" id="coupon" onchange="getCouponInfo()"class="form-control">
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Informacion del cupon escaneado</h4>
            <h5 class="card-title">Verifica que la informacion fue obtenida de manera correcta</h4>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-12 pr-12">
                  <!-- TODO aqui va la informacion del cupon -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  {!! Form::open(['route' => 'security.doChangePassword','class'=>'form']) !!}
                    {!! Form::hidden('id',Auth::user()->id) !!}
                    {!! Form::hidden('accion','Password') !!}
                    {!! Form::submit('Realizar el canje',['class'=>'btn btn-warning btn-wd','disabled'=>'true']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-user">
      <div class="card-image">
        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="{{asset('app/img/faces/face-1.jpg')}}" alt="...">
            <h5 class="title"><p id="clientName"></p></h5>
          </a>
          <p class="description">
            michael24
          </p>
        </div>
        <p class="description text-center">
          "Lamborghini Mercy
          <br> Your chick she so thirsty
          <br> I'm in that two seat Lambo"
        </p>
      </div>
      <hr>
      <div class="button-container mr-auto ml-auto">
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-facebook-square"></i>
        </button>
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-twitter"></i>
        </button>
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-google-plus-square"></i>
        </button>
      </div>
    </div>
  </div>

</div>
@endsection()
