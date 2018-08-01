@extends('app.layout._app')
@section('title',"Crear Usuario")
@section('content')
<div class="row">
  <div class="col-md-12">
    {!! Form::open(['route'=>'users.store','method'=>'POST'])!!}
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">Crear Usuario</h4>
      </div>
      <div class="card-body ">

        <div class="form-group has-label">
          {!! Form::label('id','Nombre de usuario (ID en el caso del cliente)*') !!}
          {!! Form::text('id',null,['class'=>'form-control','required','placeholder'=>"Inserta el nombre de usuario"]) !!}
        </div>


        <div class="form-group has-label">
          {!! Form::label('name','Nombre*') !!}
          {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>"Inserta el nombre"]) !!}
        </div>

        <div class="form-group has-label">
          {!! Form::label('email','Correo Electronico*') !!}
          {!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>"correo@tucosita.com"]) !!}
        </div>

        <div class="form-group has-label">
          {!! Form::label('address','Direccion del usuario*') !!}
          {!! Form::text('address',null,['class'=>'form-control','required','placeholder'=>"Direccion"]) !!}
        </div>

        <div class="form-group has-label">
          {!! Form::label('telephone','Telephone del usuario*') !!}
          {!! Form::text('telephone',null,['class'=>'form-control','required','placeholder'=>"Telefono"]) !!}
        </div>

        <div class="form-group has-label">
          {!! Form::label('password','Contraseña del usuario*') !!}
          {!! Form::password('password',['class'=>'form-control','required','placeholder'=>"Contraseña"]) !!}
        </div>

        <div class="form-group has-label">
          {!! Form::label('type','Tipo de usuario*') !!}
          {!! Form::select('type',[''=>'Selecciona un tipo','Administrador'=>'Administrador','Centro Recoleccion'=>'Centro Recoleccion','Cliente'=>'Cliente'],null,['class'=>'form-control','required']) !!}
        </div>
        <div class="card-category form-category">
          <star class="star">*</star> Campos Requeridos</div>
        </div>
        <div class="card-footer text-right">
          {!! Form::submit("Registrar",["class"=>'btn btn-info btn-fill pull-right']) !!}
          <div class="clearfix"></div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>

  @endsection()
