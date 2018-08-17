@extends('layouts._app')
@section('title',"Lista de centros")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
        <h4 class="card-title">Listado de centros de recoleccion</h4>
        <p class="card-category">Abajo puedes ver un listado de los centros de recoleccion registrados</p>
      </div>
      <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Provincia</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $actual)
            <tr>
              <td>{{$actual->id}}</td>
              <td>{{$actual->name}}</td>
              <td>{{$actual->address}}</td>
              <td>{{$actual->province_master->name}}</td>
              <td>{{$actual->status}}</td>
              <td>
                {{ Form::open(array('url' => route('CRUD.collCenter.edit'))) }}
                  {{Form::hidden('object', $actual->toJson() )}}
                  {{Form::submit('Editar',['class'=>'btn btn-info btn-fill'])}}
                {{ Form::close() }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection()
