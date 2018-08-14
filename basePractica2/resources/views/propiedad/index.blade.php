@extends('layouts.admin')

@section('contenido')
  <div class="row">
    <div class="col-lg-12">
      <h2>Propiedades</h2>
  </div>
</div>
<div class="row">
  <div class="col-2">
    <form action="{{route('prop.propiedad.tipo')}}" method="post" class="form-inline">
      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tipos de Propiedades</label>
      <select name="tipo" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option value="0">Todas</option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}"
              >{{ $tipo->nombre }}</option>
        @endforeach
      </select>
      @csrf
      <button type="submit" class="btn btn-info" name="buscar">Buscar</button>
    </form>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Propiedades
        <span class="badge badge-primary badge-pill">{{count($propiedades)}}</span>
      </li>
    </ul>
  </div>
  <div class="col-10">
    <div class="row">
    @foreach ($propiedades as $prop)
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{$prop->nombre}}</h5>
          </div>
          @if (!empty($prop->imagen))
            <img src="{{asset('storage/'.$prop->imagen)}}"
            class="img-thumbnail img-fluid"
            alt="{{ $prop->nombre}}" />
          @endif
          <div class="card-body">
            <hr class="my-4">
            <p class="lead">
              {{$prop->ubicacion}}</p>
            <p class="card-text">
            <a href="{{ route('prop.propiedad', ['id' => $prop->id]) }}" class="btn btn-primary">Ver</a>
          </div>
        </div>
     </div>
   @endforeach
   </div>
   <div class="row">
  <div class="col-md-12 text-center">
      {{ $propiedades->links() }}
    </div>
  </div>
 </div>
</div>
@endsection
