@extends('layouts._login')
@section('title',"Iniciar Sesion")

@section('content')
<div class="full-page  section-image" data-color="black" data-image="{{asset('app/img/login.jpg')}}">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="content">
    <div class="container">
      <div class="col-md-4 col-sm-6 ml-auto mr-auto">
        {!! Form::open(['route' => 'login','class'=>'form']) !!}
        <div class="card card-login card-hidden">
          <div class="card-header ">
            <h3 class="header text-center">Inicio de Sesion</h3>
          </div>
          <div class="card-body ">
            <div class="card-body">
              <div class="form-group">
                <label>Numero de identificacion</label>
                {!! Form::text('username',null,['id'=>"username",'class' => 'form-control','required','autofocus','placeholder'=>"Tu usuario"]) !!}
                @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <label>Contraseña</label>
                {!! Form::password('password',['class' => 'form-control','required','placeholder'=>"Tu contraseña"]) !!}
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="card-footer ml-auto mr-auto">
            {!! Form::submit('Iniciar Sesion',['class'=>'btn btn-warning btn-wd']) !!}
            <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('No recuerdas tu contraseña?') }}</a>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
