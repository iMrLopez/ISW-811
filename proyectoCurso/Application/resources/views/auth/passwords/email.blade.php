@extends('layouts._login')
@section('title',"Iniciar Sesion")

@section('content')
<div class="full-page  section-image" data-color="black" data-image="{{asset('app/img/login.jpg')}}">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="content">
    <div class="container">
      <div class="col-md-4 col-sm-6 ml-auto mr-auto">
        {!! Form::open(['route' => 'password.email','class'=>'form']) !!}
        <div class="card card-login card-hidden">
          <div class="card-header ">
            <h3 class="header text-center">Restablecimiento de Contraseña</h3>
          </div>
          <div class="card-body ">
            <div class="card-body">
              <div class="form-group">
                <label>Numero de identificacion</label>
                {!! Form::text('username',old('username'),['id'=>"username",'class' => 'form-control','required','autofocus','placeholder'=>"Tu usuario"]) !!}
              </div>
            </div>
          </div>
          <div class="card-footer ml-auto mr-auto">
            {!! Form::submit('Restablecer mi contraseña',['class'=>'btn btn-warning btn-wd']) !!}
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
