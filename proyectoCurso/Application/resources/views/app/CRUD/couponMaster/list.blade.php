@extends('app.layout._app')
@section('title',"Lista de materiales")
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
        <h4 class="card-title">Listado de cupones de Canje</h4>
        <p class="card-category">Abajo puedes ver un listado de los materiales reciclables registrados</p>
      </div>
      <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped" style='text-align:center'>
          <thead>
            <tr>
                <th style='text-align:center'>Nombre</th>
                <th style='text-align:center'>Descripcion</th>
                <th style='text-align:center'>Costo</th>
                <th style='text-align:center'>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $actual)
            <tr>
              <td>{{$actual->name}}</td>
              <td>{{$actual->description}}</td>
              <td>{{$actual->CRCValue}}</td>
              <td style='vertical-align: middle;'>
                {{ Form::open(array('url' => route('CRUD.CuponesDeCanje.edit'))) }}
                  {{Form::hidden('object', $actual->toJson() )}}
                  {{Form::submit('Editar',['class'=>'btn btn-info btn-fill'])}}
                {{ Form::close() }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection()