@extends('layouts._app')
@section('title',"Home")
@section('content')
<script src="{{asset('app/js/plugins/qrcode.js')}}" type="text/javascript"></script>
<script src="{{asset('app/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">

function showUserData(data){ //Result for the ajax call
  if(data.length == 0){
    swal({
      type: 'error',
      title: 'Cupon no encontrado',
      text: 'Por favor intenta de nuevo',
      footer: '<b>Marny A. Lopez Lopez - 1 1623 0677</b>'
    });
    document.getElementById('coupon').value ="";
  }else{
    document.getElementById('transactionAmmount').innerText = data[0].transactionAmmount;
    document.getElementById('transactionDescription').innerText = data[0].transactionDescription;
    document.getElementById('couponId').value = data[0].id;
    document.getElementById('btnSubmit').disabled = false ;
    console.log(data);
  }
}

function getCouponInfo(){
  var field_coupon = document.getElementById('coupon');
  var requesturl = "{{route('CRUD.CanjeoCupones.getCouponData')}}/" + field_coupon.value;
  $.ajax({url: requesturl, success: function(result){
        showUserData(result);
  }});
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
                  Monto del cupon:<p id="transactionAmmount"></p>
                  Descripcion del cupon:<p id="transactionDescription"></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  {!! Form::open(['route' => 'CRUD.CanjeoCupones.doRedeem','class'=>'form']) !!}
                    {!! Form::hidden('couponId',"",['id'=>'couponId']) !!}
                    {!! Form::submit('Realizar el canje',['class'=>'btn btn-warning btn-wd','disabled'=>'true','id'=>'btnSubmit']) !!}
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
            Proceso de canje de cupones
          </p>
        </div>
        <p class="description text-center">
          <ul>
            <li>Escanea el cupon</li>
            <li>Verifica la informacion y entrega el producto</li>
            <li>Realiza el canje del cupon en el sistema con el boton</li>
          </ul>
        </p>
      </div>
      <hr>
    </div>
  </div>

</div>
@endsection()
