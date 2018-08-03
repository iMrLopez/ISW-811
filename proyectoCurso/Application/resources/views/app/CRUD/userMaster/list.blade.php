@extends('app.layout._app')
@section('title',"Lista de materiales")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
        <h4 class="card-title">Listado de Clientes</h4>
        <p class="card-category">Abajo puedes ver un listado de los clientes registrados</p>
      </div>
      <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped" style='text-align:center'>
          <thead>
            <tr>
                <th style='text-align:center'>Usuario</th>
                <th style='text-align:center'>Nombre</th>
                <th style='text-align:center'>Correo</th>
                <th style='text-align:center'>Direccion</th>
                @if($meta['role'] == 'collection')
                <th style='text-align:center'>Centro de recoleccion</th>
                @endif
                <th style='text-align:center'>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $actual)
            <tr>
              <td>{{$actual->uname}}</td>
              <td>{{$actual->name}}</td>
              <td>{{$actual->email}}</td>
              <td>{{$actual->address}}</td>
              @if($meta['role'] == 'collection')
                @if(isset($actual->collectionCenter->name))
                  <td>{{$actual->collectionCenter->name}}</td>
                @else
                  <td><button class="btn btn-danger">No asignado! - debe asignarlo en centros de acopio</button></td>
                @endif
                <td style='vertical-align: middle;'>
                  {{ Form::open(array('url' => route('CRUD.GestionDeUsuarios.edit'))) }}
                    {{Form::hidden('object', $actual->toJson() )}}
                    {{Form::submit('Editar',['class'=>'btn btn-info btn-fill'])}}
                  {{ Form::close() }}
                </td>
              @else
              <td style='vertical-align: middle;'>
                No hay acciones disponibles
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection()
