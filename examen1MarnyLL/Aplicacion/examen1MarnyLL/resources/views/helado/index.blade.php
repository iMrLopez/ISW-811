@extends('layouts.master')
@section('contenido')
<!--Mensaje de confirmación-->
@if(Session::has('info'))
<div class="row">
  <div class="col-md-12">
    <p class="alert alert-info">{{ Session::get('info') }}</p>
  </div>
</div>
@endif
<div class="row">
  <div class="col-lg-12">
    <h2>Lista de Helados</h2>
  </div>
</div>
<div class="row">
  <div class="col-3">
    <div class="list-group">
      <!--Lista de características-->
      @foreach($caracteristicas as $tipo)
      <a  href="{{ $tipo->id }}" class="list-group-item list-group-item-action" >{{ $tipo->nombre }}</a>
      @endforeach

      <!--Lista de características-->
    </div>
    <hr>
    <p>
      <!--Extra precio maximo de todos los helados-->
      <b>Precio maximo: {{$precioMax}}</b>
    </p>
  </div>
  <div class="col-9">
    <div class="row">
      <!--Lista de helados-->
      @foreach($helados as $helado)
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="card-title">{{ $helado['nombre'] }}<br/></h5>
              <!--Cantidad de votos registrados para el helado-->
              <small><b> {{count($helado->votos)}} voto(s) </b></small>
            </div>
            <div class=" justify-content-between" role="group" aria-label="Basic example">
              Votar:
              <!--Votar 1 punto-->
              <a class="btn btn-info" href="{{route('helado.votar', ['helado' => $helado->id,'voto'=>'1'])}}">+1</a>
              <!--Votar 2 puntos-->
              <a class="btn btn-info" href="{{route('helado.votar', ['helado' => $helado->id,'voto'=>'3'])}}">+3</a>
            </div>
            <hr>
            <p class="card-text">
              <b>Precio: </b>{{ $helado['precioUnitario'] }}
            </p>
            <a class="btn btn-success" href="{{route('helado.editar', ['helado' => $helado])}}">Editar</a>
          </div>
        </div>
      </div>
      @endforeach
      <!--Lista de helados-->
    </div>
  </div>
</div>
@endsection
