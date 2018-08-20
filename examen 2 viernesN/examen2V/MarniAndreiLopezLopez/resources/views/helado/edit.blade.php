@extends('layouts.master')

@section('contenido')
@include('partials.errors')

<div class="row">
  <div class="col-md-12">
      <form action="{{ route('helado.update',['hela'=>$elemento->id])}}" method="post"  method="post" enctype='multipart/form-data'>
      <br/><br/>
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input
        type="text"
        class="form-control"
        id="nombre"
        name="nombre"
        value="{{$elemento->nombre}}">
      </div>
      <div class="form-group">
        <label for="content">Detalle</label>

        <textarea
        class="form-control"
        id="detalle"
        name="detalle">{{$elemento->detalle}}</textarea>
      </div>
      <div class="form-group">
        <label for="nombre">Preciop Unitario</label>
        <input
        type="number"
        class="form-control"
        id="precioUnitario"
        name="precioUnitario"
        value="{{$elemento->precioUnitario}}">
      </div>

      <div class="form-group">
        @foreach($caracteristicas as $cat)
        <div class="form-check">
          <input
          "form-check-input"
          type="checkbox"
          name="caracteristicas[]"
          value="{{ $cat->id }}"
          {{ $elemento->caracteristicas->contains($cat->id) ? 'checked' : '' }}
          />
          <label class="form-check-label">{{ $cat->nombre }}</label>
        </div>
        @endforeach
      </div>
      <div class="form-group">
        <label for="alturaFinal">Imagen de raza</label>
        <input
        type="file"
        class="form-control"
        id="imgHelado"
        name="imgHelado">
      </div>
      @csrf
      <input
      type="hidden"
      id="id"
      name="id"
      value="{{$elemento->id}}">
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>
@endsection
