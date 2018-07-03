@extends('app.layout._app')
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
        <h4 class="card-title">TOP de clientes global </h4>
        <p class="card-category">Quien es el cliente con mas productos reciclados?</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td><div class="flag"><img src="{{asset('app/img/flags/US.png')}}"</div></td>
                    <td>USA</td>
                    <td class="text-right">2.920</td>
                    <td class="text-right">53.23%</td>
                  </tr>
                </tbody>
              </table>
            </div>
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
        <h4 class="card-title">Noticias</h4>
        <p class="card-category">Las ultimas noticias del mundo verde!</p>
      </div>
      <div class="card-body ">
        <div class="table-full-width">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                </td>
                <td>Sign contract for "What are conference organizers afraid of?"</td>
                <td class="td-actions text-right">
                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                    <i class="fa fa-times"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
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
</div>
@endsection()
