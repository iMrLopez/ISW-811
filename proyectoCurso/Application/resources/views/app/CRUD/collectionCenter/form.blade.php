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
        {!! Form::hidden('id',$data->id) !!}
        {!! Form::hidden('accion',$meta['accion']) !!}
        <div class="form-group">
          <label>Nombre</label>
          {!! Form::text('name',$data->name,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Direccion</label>
          {!! Form::text('address',$data->address,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Provincia</label>
          {!! Form::select('province_master_id', $meta['provinces'], $data->provinceId, ['id' => 'provinceId', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          <label>Estado</label>
          {!! Form::select('status', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $data->status,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Usuario administrador</label>
          {!! Form::select('user_master_id', $meta['users'], $data->user_master_id,['class' => 'form-control','required']) !!}
        </div>
        {!! Form::submit($meta['accion'],['class'=>'btn btn-warning btn-wd']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection()
