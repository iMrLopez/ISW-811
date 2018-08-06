@extends('app.layout._app')
@section('title',"Home")
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

function getWalletMaster(){
  var wallet_master = document.getElementById('wallet_master').value;
  $.ajax({url:"{{route('CRUD.GestionDeUsuarios.getUserWithWallet')}}/" + wallet_master, success: function(result){
  //  $("#div1").html(result);
    console.log(result);
  }});

}

function doCalculateTotal(prodId){ //Used to calculate the new total for this wallet_detail line
  var cost = document.getElementById('materialCost'+prodId);
  var materialAmmount = document.getElementById('materialAmmount'+prodId);
  var transactionAmmount = document.getElementById('transactionAmmount'+prodId);
  transactionAmmount.value =  (cost.value * materialAmmount.value);
}

</script>


{!! Form::open(['route' => 'CRUD.CanjeoMateriales.doRedeem','class'=>'form']) !!}
<div class="row">
  <div class="col-md-12">
    <div class="card card-stats">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <label>Numero de identificacion</label>
            {!! Form::text('wallet_master',null,['id'=>'wallet_master','class'=>'form-control','placeholder'=>'Ingresa identificacion','onChange' => 'getWalletMaster()']) !!}
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          </div>
        </div>
        <div class="row"><p>&nbsp;</p></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  @foreach($data as $actual)
  <div class="col-md-3">
    {!! Form::hidden('materialCost',$actual->CRCValue,['id'=>'materialCost'.$actual->id]) !!} <!-- USED AS THE BASE MATERIAL COST -->

    {!! Form::hidden('wallet_detail['.$actual->id.'][transactionDescription]','Cambio - '.$actual->name.' () @ '.$actual->CRCValue) !!} <!-- THIS LINE DESCRIPTION -->
    {!! Form::hidden('wallet_detail['.$actual->id.'][transactionType]','Credito') !!} <!-- THIS LINE TYPE -->

    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <img class="avatar border-gray" src="{{$actual->img}}" alt="..." width="100%" height="100%">
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Cantidad de {{$actual->name}}: </p>
              <h4 class="card-title">{!! Form::number('wallet_detail['.$actual->id.'][materialAmmount]','0.00',['min'=>'0','id'=>'materialAmmount'.$actual->id,'class'=>'form-control','onChange'=>'doCalculateTotal('.$actual->id.')']) !!}</h4>
              <p class="card-category">x {{$actual->CRCValue}} = </p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i> Total de ecolones a acreditar: {!! Form::text('wallet_detail['.$actual->id.'][transactionAmmount]','0.00',['id'=>'transactionAmmount'.$actual->id,'readonly'=>'true','class'=>'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{!! Form::submit('Realizar transaccion',['class'=>'btn btn-warning btn-wd']) !!}
{!! Form::close() !!}




@endsection()
