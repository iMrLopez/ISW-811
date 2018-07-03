@extends('app.layout._login')
@section('title',"Iniciar Sesion")

@section('content')
        <div class="full-page  section-image" data-color="green" data-image="{{asset('app/img/full-screen-image-1.jpg')}}">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                      {!! Form::open(['route' => 'security.doLogin','class'=>'form']) !!}
                            <div class="card card-login card-hidden">
                                <div class="card-header ">
                                    <h3 class="header text-center">Inicio de Sesion</h3>
                                </div>
                                <div class="card-body ">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Numero de identificacion</label>
                                            {!! Form::text('username','',['class' => 'form-control','required','placeholder'=>"Tu usuario"]) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            {!! Form::password('password',['class' => 'form-control','required','placeholder'=>"Tu contraseña"]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                  {!! Form::submit('Iniciar Sesion',['class'=>'btn btn-warning btn-wd']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
