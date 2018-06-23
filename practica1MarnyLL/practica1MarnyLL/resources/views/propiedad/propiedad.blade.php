@extends('layouts.master')
@section('titulo', 'Información Propiedad')
@section('contenido')
<ul class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    <h2 >Nombre</h2>
  </button>
  <li class="list-group-item">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Ubicación</h5>
        <p class="mb-1">
      <!--Listas de Rasgos-->
          <span class="badge badge-pill badge-info">
            Rasgo
          </span>
      <!--Listas de Rasgos-->
      </p>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <img src="{{ URL::to('img/sleep-in-bed.png') }}" alt="Habitaciones" style="width:30px;height:30px" />
<!--Cantidad de Habitaciones-->
            <span class="badge badge-primary badge-pill">#</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
              <img src="{{ URL::to('img/car-in-a-garage.png') }}" alt="carros" style="width:30px;height:30px" />
<!--Cantidad de Carros-->
            <span class="badge badge-primary badge-pill">#</span>
          </li>
        </ul>
    </div>

</ul>

@endsection
