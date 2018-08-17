@extends('layouts._app')
@section('title',"Home")
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
var products = [];
var ammt_transactiontotal = 0;
var regex =  /(?<=\()(.*?)(?=\))/;

function doCalculateTotal(prodId){ //Used to calculate the new total for this wallet_detail line prodId is the field number

  var field_transactionDescription = document.getElementById('wallet_detail_transactionDescription'+prodId);
  var field_cost = document.getElementById('tmp_productCost'+prodId);

  var field_selectorProductQuantity = document.getElementById('selectorProductQuantity'+prodId);
  var field_productQuantity = document.getElementById('productQuantity'+prodId);

  var field_transactionAmmount = document.getElementById('transactionAmmount'+prodId);
  var button_action = document.getElementById('button_action'+prodId);
  var label_added = document.getElementById('added'+prodId);

  var field_totalTransaction = document.getElementById('totalTransaction');
  var field_walletOldBalance = document.getElementById('walletOldBalance');
  var field_walletNewBalance = document.getElementById('walletNewBalance');

  calculateTotal();

  if((eval(ammt_transactiontotal) + eval(field_cost.value)) <= field_walletOldBalance.value && (field_walletOldBalance.value != 0)){

    field_transactionDescription.value = field_transactionDescription.value.replace(regex, '1'); //New transaction description
    field_transactionAmmount.value =  (field_cost.value); //New transactionAmmount for this
    field_productQuantity.value = 1; //Put the product quantity to 1
    button_action.hidden = true; //hide the button
    label_added.innerText = 'Adicionado'; //Show an added label

    products.push({type:field_transactionDescription.value, ammount:field_transactionAmmount.value}); //Save the product on the control array

    calculateTotal();

    field_totalTransaction.value = ammt_transactiontotal; //Save the  total transaction value
    field_walletNewBalance.value = (field_walletOldBalance.value - ammt_transactiontotal); //Save the new balance on the wallet display

  }else{
    swal({
      type: 'error',
      title: 'Producto no adicionado',
      text: 'El saldo de su billetera no es suficiente para comprar este producto',
      footer: '<b>Marny A. Lopez Lopez - 1 1623 0677</b>'
    })
  }
}

function calculateTotal(){
  var tmp_sum=0;
  products.forEach(function(element) {
      tmp_sum += eval(element.ammount);
  });
  ammt_transactiontotal = tmp_sum;
}

</script>


{!! Form::open(['route' => 'client.coupon.doCreate','class'=>'form']) !!}
{!! Form::hidden('clientId',Auth::user()->username,null) !!} <!-- THIS LINE DESCRIPTION -->
<div class="row">
  <div class="col-lg-4 col-sm-6">
    <div class="card card-stats">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-chart text-warning"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Balance de la cuenta</p>
              {!! Form::hidden(null,Auth::user()->wallet_master->actualBalance,['id'=>'walletOldBalance']) !!}
              <h4 class="card-title">{{Auth::user()->wallet_master->actualBalance}}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
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
              <p class="card-category">Ecomonedas a canjear</p>
              <h4 class="card-title">{!! Form::text(null,null,['id'=>'totalTransaction','readonly','class'=>'form-control']) !!}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6">
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
              <p class="card-category">Ecomonedas Restantes</p>
              <h4 class="card-title">{!! Form::text(null,null,['id'=>'walletNewBalance','readonly','class'=>'form-control']) !!}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  @foreach($data as $actual)
  <div class="col-md-3">
    {!! Form::hidden(null,$actual->cost,['id'=>'tmp_productCost'.$actual->id]) !!} <!-- USED AS THE BASE MATERIAL COST -->

    {!! Form::hidden('wallet_detail['.$actual->id.'][transactionDescription]','Canje - '.$actual->name.' () x '.$actual->cost,['id'=>'wallet_detail_transactionDescription'.$actual->id]) !!} <!-- THIS LINE DESCRIPTION -->
    {!! Form::hidden('wallet_detail['.$actual->id.'][transactionType]','Debito') !!} <!-- THIS LINE TYPE -->

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
              <p class="card-category"></p>
              {!! Form::hidden('wallet_detail['.$actual->id.'][productQuantity]',0.00,['id'=>'productQuantity'.$actual->id]) !!}
              <h4 class="card-title">{{$actual->name}}</h4>
              <h3 class="card-title" id='added{{$actual->id}}'></h3>
              <button type='button' id="button_action{{$actual->id}}"class="btn btn-large btn-info" onClick='doCalculateTotal({{$actual->id}})'>Agregar a la cesta</button>
              <p class="card-category">x {{$actual->cost}} = </p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <p><i class="fa fa-check"></i>Total de ecolones a debitar:{!! Form::text('wallet_detail['.$actual->id.'][transactionAmmount]','0.00',['id'=>'transactionAmmount'.$actual->id,'readonly'=>'true','class'=>'form-control']) !!}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="row">
  <div class="col-md-6">
    <p>&nbsp;</p>
    <input type="button" value="Reiniciar Transaccion" onClick="history.go(0)" class='btn pull-left btn-info btn-wd'>
  </div>
  <div class="col-md-6">
    <p>&nbsp;</p>
    {!! Form::submit('Realizar transaccion',['class'=>'btn pull-right btn-warning btn-wd']) !!}
  </div>
</div>
{!! Form::close() !!}


@endsection()
