@extends('layouts._app')
@section('title',"Home")
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">


function doCalculateTotal(prodId){ //Used to calculate the new total for this wallet_detail line prodId is the field number

  var regex =  /(?<=\()(.*?)(?=\))/;

  var field_transactionDescription = document.getElementById('wallet_detail_transactionDescription'+prodId);
  var field_cost = document.getElementById('tmp_productCost'+prodId);
  var field_ammount = document.getElementById('productAmmount'+prodId);
  var field_transactionAmmount = document.getElementById('transactionAmmount'+prodId);
  var field_totalTransaction = document.getElementById('totalTransaction');


  field_transactionDescription.value = field_transactionDescription.value.replace(regex, field_ammount.value);
  field_transactionAmmount.value =  (field_cost.value * field_ammount.value);

totalTransaction





}

</script>


{!! Form::open(['route' => 'CRUD.CanjeoMateriales.doRedeem','class'=>'form']) !!}
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
              <h4 class="card-title">{!! Form::text(null,Auth::user()->wallet_master->actualBalance,['readonly','class'=>'form-control','id'=>'walletOldBalance']) !!}</h4>
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
              <h4 class="card-title">{!! Form::text('wallet_master[totalTransaction]','0.00',['id'=>'totalTransaction','readonly','class'=>'form-control']) !!}</h4>
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
              <h4 class="card-title">{!! Form::text('wallet_detail[walletNewBalance]','0.00',['readonly','class'=>'form-control']) !!}</h4>
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
              <p class="card-category">{{$actual->name}}: </p>
              <h4 class="card-title">{!! Form::number('wallet_detail['.$actual->id.'][productAmmount]','0.00',['min'=>'0','id'=>'productAmmount'.$actual->id,'class'=>'form-control','onChange'=>'doCalculateTotal('.$actual->id.')']) !!}</h4>
              <p class="card-category">x {{$actual->cost}} = </p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-check"></i> Total de ecolones a debitar: {!! Form::text('wallet_detail['.$actual->id.'][transactionAmmount]','0.00',['id'=>'transactionAmmount'.$actual->id,'readonly'=>'true','class'=>'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{!! Form::close() !!}




@endsection()
