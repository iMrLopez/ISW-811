@extends('layouts.master')

@section('contenido')
<!--Mensajes de error de la validación-->
@include('partials.errors')
<div class="row">
  <div class="col-md-12">

    <form action="{{route('helado.update')}}" method="post">
      <br/><br/>
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$helado->nombre}}">
      </div>
      <div class="form-group">
        <label >Detalle</label>
        <textarea class="form-control" name="detalle">{{$helado->detalle}}</textarea>
      </div>
      <div class="form-group">
        <label>Precio Unitario</label>
        <input
        type="number"
        class="form-control"
        name="precioUnitario"
        value="{{$helado->precioUnitario}}">
      </div>

      <div class="form-group">
        <!--Lista de caracteristicas-->
        @foreach($caracteristicas as $caracteristica)
        <div class="form-check">
          <input
          class="form-check-input" type="checkbox"
          name="caracteristicas[]"
          value="{{ $caracteristica->id }}"
          {{ $helado->caracteristicas->contains($caracteristica->id) ? 'checked' : '' }}
          />
          <label class="form-check-label">{{ $caracteristica->nombre }}</label>
        </div>
        @endforeach
        <!--Lista de caracteristicas-->
      </div>
      @csrf
      <!--Identificador del helado-->
      <input type="hidden" name="id" value="{{ $helado->id }}">
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>
@endsection
