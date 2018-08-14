@extends('layouts._app')
@section('title',"Mantenimiento de centros")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$meta['accion']}} productos para canjeo</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'CRUD.Product.store','class'=>'form']) !!}
        {!! Form::hidden('id',$data->id) !!}
        {!! Form::hidden('accion',$meta['accion']) !!}
        <div class="form-group">
          <label>Nombre</label>
          {!! Form::text('name',$data->name,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Descripcion</label>
          {!! Form::text('description',$data->description,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Precio</label>
          {!! Form::number('cost', $data->cost, ['id' => 'cost', 'class' => 'form-control','required']) !!}
        </div>
        {!! Form::submit($meta['accion'],['class'=>'btn btn-warning btn-wd']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection()
