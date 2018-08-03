@extends('app.layout._app')
@section('title',"Mantenimiento de centros")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$meta['accion']}} usuario en el sistema</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'CRUD.GestionDeUsuarios.store','class'=>'form']) !!}
        {!! Form::hidden('id',$data->id) !!}
        {!! Form::hidden('role',$data->role) !!}
        {!! Form::hidden('accion',$meta['accion']) !!}
        <div class="form-group">
          <label>Nombre de Usuario</label>
          {!! Form::text('uname',$data->uname,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Nombre</label>
          {!! Form::text('name',$data->name,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Correo</label>
            {!! Form::email('email',$data->email,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Direccion</label>
          {!! Form::text('address',$data->address,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Telefono</label>
          {!! Form::text('telephone',$data->telephone,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Estado</label>
          {!! Form::select('status', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $data->status,['class' => 'form-control','required']) !!}
        </div>
        {!! Form::submit($meta['accion'],['class'=>'btn btn-warning btn-wd']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection()
