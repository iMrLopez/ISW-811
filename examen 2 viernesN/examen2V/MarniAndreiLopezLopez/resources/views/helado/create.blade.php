@extends('layouts.master')

@section('contenido')
@include('partials.errors')

<div class="row">
  <div class="col-md-12">
    <form action="{{ route('helado.insert') }}" method="post"  enctype='multipart/form-data'>
      <br/><br/>
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input
        type="text"
        class="form-control"
        id="nombre"
        name="nombre">
      </div>
      <div class="form-group">
        <label for="content">Detalle</label>

        <textarea
        class="form-control"
        id="detalle"
        name="detalle"></textarea>
      </div>
      <div class="form-group">
        <label for="nombre">Preciop Unitario</label>
        <input
        type="number"
        class="form-control"
        id="precioUnitario"
        name="precioUnitario">
      </div>

      <div class="form-group">
        @foreach($caracteristicas as $cat)
        <div class="form-check">
          <input
          "form-check-input"
          type="checkbox"
          name="caracteristicas[]"
          value="{{ $cat->id }}"
          />
          <label class="form-check-label">{{ $cat->nombre }}</label>
        </div>
        @endforeach
      </div>

      <div class="form-group">
        <label for="alturaFinal">Imagen de raza</label>
        <input
        type="file"
        class="image"
        id="imgHelado"
        name="imgHelado">
      </div>
      @csrf
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
  </div>
</div>
@endsection
