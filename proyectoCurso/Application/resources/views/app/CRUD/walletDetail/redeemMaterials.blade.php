@extends('layouts._app')
@section('title',"Home")
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

function getWalletMaster(){ //AJAX request regarding the search of a client
  var requesturl = "{{route('CRUD.GestionDeUsuarios.getUserWithWallet')}}/" + document.getElementById('wallet_masterid').value;
  $.ajax({url: requesturl, success: function(result){
    showUserData(result);
  }});
}

function showUserData(data){ //Result for the ajax call
  if(data.length == 0){
    swal({
      type: 'error',
      title: 'Cliente no encontrado',
      text: 'Por favor intenta de nuevo',
      footer: '<b>Marny A. Lopez Lopez - 1 1623 0677</b>'
    })
  }else{
    document.getElementById('wallet_mastername').value = data[0].name;
    document.getElementById('wallet_masteremail').value = data[0].email;
    console.log(data);
  }

}

function doCalculateTotal(prodId){ //Used to calculate the new total for this wallet_detail line prodId is the field number

  var regex =  /(?<=\()(.*?)(?=\))/;

  var transactionDescription = document.getElementById('wallet_detail_transactionDescription'+prodId);
  var cost = document.getElementById('tmp_materialCost'+prodId);
  var materialAmmount = document.getElementById('materialAmmount'+prodId);
  var transactionAmmount = document.getElementById('transactionAmmount'+prodId);


  transactionDescription.value = transactionDescription.value.replace(regex, materialAmmount.value);
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
            <label>Numero de centro de recoleccion</label>
            {!! Form::text('collectionCenter_master[id]',Auth::user()->collectionCenter->id,['readonly','class'=>'form-control']) !!}
          </div>
          <div class="col-md-4">
            <label>Centro de recoleccion</label>
            {!! Form::text('collectionCenter_master[name]',Auth::user()->collectionCenter->name,['readonly','class'=>'form-control','placeholder'=>'Ingresa la identificacion del cliente']) !!}
          </div>
          <div class="col-md-4">
            <label>Direccion del centro de recoleccion</label>
            {!! Form::text('collectionCenter_master[address]',Auth::user()->collectionCenter->address,['readonly','class'=>'form-control','placeholder'=>'Ingresa la identificacion del cliente']) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="javascript:location.reload(true)" class="btn pull-right btn-info"><i class="fa fa-refresh"></i>Iniciar de nuevo</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label>Numero de identificacion</label>
            {!! Form::password('wallet_master[id]',['required','id'=>'wallet_masterid','class'=>'form-control','placeholder'=>'Ingresa identificacion del cliente','onChange' => 'getWalletMaster()']) !!}
          </div>
          <div class="col-md-4">
            <label>Nombre del cliente</label>
            {!! Form::text('wallet_master[name]',null,['readonly','id'=>'wallet_mastername','class'=>'form-control','placeholder'=>'Ingresa la identificacion del cliente']) !!}
          </div>
          <div class="col-md-4">
            <label>Correo electronico del cliente</label>
            {!! Form::text('wallet_master[email]',null,['readonly','id'=>'wallet_masteremail','class'=>'form-control','placeholder'=>'Ingresa la identificacion del cliente']) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>&nbsp;</p>
            {!! Form::submit('Realizar transaccion',['class'=>'btn pull-right btn-warning btn-wd']) !!}
          </div>
        </div>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
</div>

<div class="row">
  @foreach($data as $actual)
  <div class="col-md-3">
    {!! Form::hidden(null,$actual->CRCValue,['id'=>'tmp_materialCost'.$actual->id]) !!} <!-- USED AS THE BASE MATERIAL COST -->

    {!! Form::hidden('wallet_detail['.$actual->id.'][transactionDescription]','Cambio - '.$actual->name.' () x '.$actual->CRCValue,['id'=>'wallet_detail_transactionDescription'.$actual->id]) !!} <!-- THIS LINE DESCRIPTION -->
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
          <i class="fa fa-check"></i> Total de ecolones a acreditar: {!! Form::text('wallet_detail['.$actual->id.'][transactionAmmount]','0.00',['id'=>'transactionAmmount'.$actual->id,'readonly'=>'true','class'=>'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{!! Form::close() !!}




@endsection()
