@extends('layouts.admin')

@section('contenido')
  @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif

    <div>
        @can('nueva-propiedad')
          <a href="crear">Crear</a>
        @endcan
    </div>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col" colspan="2">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($propiedades as $prop)
    <tr>
      <th scope="row">
        <!--Presentar Imagen-->

      </th>
      <th scope="row">{{$prop->nombre}}</th>
      <th scope="row">{{$prop->tipo->nombre}}</th>
      <td>
        @can('actualizar-propiedad',$prop)
        <a href="{{ route('admin.edit', ['id' => $prop->id]) }}">Editar</a>
        @endcan
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
@endsection
