@extends('app.layout._app')
@section('title',"Reporte de ecomonedas por centros")
@section('content')

<!-- FORMULARIO DE SOLICITUD DEL REPORTE -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Ecomonedas producidas por centro de acopio</h4>
      </div>
      <div class="card-body">
          {!! Form::open(['route' => 'CRUD.collCenter.doReporting','class'=>'form']) !!}
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Tipo de grafico</label>
                {!! Form::select('type', [null=>'Selecciona un tipo'], null,['class' => 'form-control','required','id'=>'type']) !!}
              </div>
            </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha Inicial</label>
              {!! Form::date('datestart',null,['class' => 'form-control','required','id'=>'datestart', 'onchange'=>'selectedStartMonth()']) !!}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha Final</label> - <label id='aclaracion'>(Selecciona primero la fecha inicial)</label>
              {!! Form::date('dateend', null,['class' => 'form-control','required','id'=>'dateend','readOnly'=>'true']) !!}
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-12">
            {!! Form::submit('Generar Reporte',['class'=>'btn btn-warning btn-wd']) !!}
          </div>
        </div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- RESULTADO DEL REPORTE GENERADO -->
@if(isset($chart))
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Resultado del repporte generado</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div>{!! $chart->container() !!}</div>
           <script src="{{asset("app/js/plugins/Chartjs.min.js")}}" charset="utf-8"></script>
           {!! $chart->script() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

var resultado;
$.getJSON('{{asset("app/plain/static.json")}}', function(data) {
    resultado = data; //data is the JSON string // Stores the data in "resultado var to be used in selectedStartMonth()"
    //Agregar los tipos de graficos
    data.graphtypes.forEach(element => {
      var x = document.getElementById("type");
      var option = document.createElement("option");
      option.text = element.name;
      option.value = element.value;
      x.add(option);
    });
  });

  //Se ejecuta cuando el usuario selecciona el mes inicial

  function selectedStartMonth(){
    document.getElementById("dateend").min = document.getElementById("datestart").value;
    document.getElementById("dateend").readOnly = false;
    document.getElementById("aclaracion").innerHTML = "Ingresa una fecha mayor a: "+document.getElementById("datestart").value;
  }




</script>

@endsection()
