@extends('layouts.master')
@section('titulo', 'Lista de Propiedades')

@section('contenido')
  <div class="row">
    <div class="col-lg-12">
      <h2>{{ $titulo='Titulo' }}</h2>
  </div>
</div>
<div class="row">
  <div class="col-2">
    <form action="" method="post" class="form-inline">
      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Propiedades</label>
      <select name="tipo" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option value="0">Todas</option>
        <!--Listas Tipos-->
            <option value="">Nombre Tipo</option>
      </select>
      @csrf
      <button type="submit" class="btn btn-info" name="buscar">Buscar</button>
    </form>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Propiedades
                                      <!--# de Propiedades-->
        <span class="badge badge-primary badge-pill">#</span>
      </li>
    </ul>
  </div>
  <div class="col-10">
    <div class="row">
      <!--Listas de Propiedades-->
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Nombre</h5>
            <hr class="my-4">
            <p class="lead">
              Ubicacion</p>
            <p class="card-text">
            <a href="" class="btn btn-primary">Ver</a>
          </div>
        </div>
     </div>

     <!--Listas de Propiedades-->
   </div>
 </div>
</div>
@endsection
