@extends('app.layout._app')
@section('title',"Lista de usuarios")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">Listado de Usuarios</h4>
      </div>
      <div class="card-body">
        <a href="{{ route('users.create') }}" class="btn btn-info">Agregar Usuario</a>
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo Electronico</th>
              <th>Tipo de Usuario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->role}}</td>
              <td>
                <a href="" class="btn btn-danger">Eliminar</a>
                <a href="" class="btn btn-warning">Editar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $data->render() !!}
      </div>
    </div>
  </div>
  @endsection()
