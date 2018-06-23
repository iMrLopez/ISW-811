@extends('layouts.admin')

@section('contenido')
  @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  <!--Listas de Propiedades-->
    <tr>
      <th scope="row">Nombre de Propiedad</th>
      <th scope="row">Nombre de Tipo</th>
      <td><a href="">Editar</a></td>
    </tr>
   <!--Listas de Propiedades-->
  </tbody>
</table>
@endsection
