@extends('app.layout._app')
@section('title',"Home")
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-6">
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
              <p class="card-category">Ecomonedas Disponibles</p>
              <h4 class="card-title">{{(session()->get('user.instance.wallet_master.actualBalance'))}}</h4>
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
              <p class="card-category">Ecomonedas Canjeadas</p>
              <h4 class="card-title">{{(session()->get('user.instance.wallet_master.redeemedBalance'))}}</h4>
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
              <p class="card-category">Ecomonedas Generadas</p>
              <h4 class="card-title">{{(session()->get('user.instance.wallet_master.totalBalance'))}}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">Historial de transacciones</h4>
        <p class="card-category">Aca puedes visualizar el historial transaccional de tu cuenta</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            ####VALOR####
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection()
