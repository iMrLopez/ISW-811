@extends('app.layout._app')
@section('title',"Mantenimiento de centros")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$meta['accion']}} centros de recoleccion</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'CRUD.collCenter.store','class'=>'form']) !!}
        <div class="form-group">
          <label>Nombre</label>
          {!! Form::text('name',$data->name,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Direccion</label>
          {!! Form::text('address',$data->address,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Estado</label>
          {!! Form::select('status', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $data->status,['class' => 'form-control','required']) !!}
        </div>
        {!! Form::submit('Iniciar Sesion',['class'=>'btn btn-warning btn-wd']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection()
