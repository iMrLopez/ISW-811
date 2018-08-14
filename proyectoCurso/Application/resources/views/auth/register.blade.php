@extends('layouts._login')
@section('title',"Iniciar Sesion")

@section('content')
<div class="full-page  section-image" data-color="red" data-image="{{asset('app/img/login.jpg')}}">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="content">
    <div class="container">
      <div class="col-md-6 col-sm-6 ml-auto mr-auto">
        {!! Form::open(['route' => 'register','class'=>'form']) !!}
        {!! Form::hidden('role','client') !!}
        {!! Form::hidden('status','Activo') !!}
        <div class="card card-login card-hidden">
          <div class="card-header ">
            <h3 class="header text-center">Registrar usuario</h3>
          </div>
          <div class="card-body ">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Numero de identificacion</label>
                    {!! Form::text('username',null,['class' => 'form-control','required','placeholder'=>"Tu usuario"]) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nombre completo</label>
                    {!! Form::text('name',null,['class' => 'form-control','required','placeholder'=>"Tu Nombre completo"]) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Correo electronico</label>
                    {!! Form::email('email',null,['class' => 'form-control','required','placeholder'=>"Tu correo electronico"]) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Direccion de residencia</label>
                    {!! Form::text('address',null,['class' => 'form-control','required','placeholder'=>"Tu direccion"]) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Numero de telefono</label>
                    {!! Form::text('telephone',null,['class' => 'form-control','required','placeholder'=>"Tu telefono"]) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contraseña</label>
                    {!! Form::password('password',['class' => 'form-control','required','placeholder'=>"Tu contraseña"]) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ml-auto mr-auto">
            {!! Form::submit('Registrar',['class'=>'btn btn-warning btn-wd']) !!}
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
