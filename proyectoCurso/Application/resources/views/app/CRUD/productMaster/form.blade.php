@extends('layouts._app')
@section('title',"Mantenimiento de centros")
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$meta['accion']}} productos para canjeo</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'CRUD.Product.store','class'=>'form', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::hidden('id',$data->id) !!}
        {!! Form::hidden('accion',$meta['accion']) !!}
        <div class="form-group">
          <label>Nombre</label>
          {!! Form::text('name',$data->name,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Imagen</label>
          {!! Form::file('image',['class' => 'form-control',($data->img)?'':'required']) !!}
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
  @if($meta['accion'] != 'Crear')
  <div class="col-md-4">
    <div class="card card-user">
      <div class="card-image">
        <div style='height:300px;width:400;background-color:{{$data->HTMLColor}}'></div>
        <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="..."> -->
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="{{$data->img}}" alt="...">
            <h5 class="title">{{$data->name}}</h5>
          </a>
          <!-- <p class="description">
            michael24
          </p> -->
        </div>
        <p class="description text-center">
          <b>Precio: </b>{{$data->cost}}<br>
          <b>Estado: </b>{{$data->status}}<br>
        </p>
      </div>
      <hr>
      <div class="button-container mr-auto ml-auto">
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-facebook-square"></i>
        </button>
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-twitter"></i>
        </button>
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-google-plus-square"></i>
        </button>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection()
