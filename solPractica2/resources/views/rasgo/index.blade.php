@extends('layouts.admin')
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <h1>Rasgos</h1>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th>Nombre</th>
        <th>Fecha de Creación</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-outline-success" >
            <img src="{{asset('img/add-1.png')}}"
            class="ico"
            alt="Nuevo" />
          </a>
        </th>
      </tr>
      @csrf
      @foreach ($rasgo as $item)
        <tr class="rasgo{{$item->id}}">
          <td>{{ $item->nombre }}</td>
          <td>{{ $item->created_at }}</td>
          <td>
            <a href="#" class="show-modal btn btn-outline-info" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" >
              <img src="{{asset('img/view-2.png')}}"
              class="ico"
              alt="Ver" />
            </a>
            <a href="#" class="edit-modal btn btn-outline-warning" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" >
              <img src="{{asset('img/edit.png')}}"
              class="ico"
              alt="Editar" />
            </a>

          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$rasgo->links()}}
</div>
{{--Inicio Formulario Modal Nuevo--}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear rasgo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none"></div>

        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="nombre"
              placeholder="Nombre de la rasgo" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-outline-warning" type="submit" id="add">
              <img src="{{asset('img/save.png')}}"
              class="ico"
              alt="Guardar" />
            </button>
            <button class="btn btn-outline-warning" type="button" data-dismiss="modal">
              <img src="{{asset('img/close.png')}}"
              class="ico"
              alt="Cerrar" />
            </button>
          </div>
    </div>
  </div>
</div>

{{--Fin Formulario Modal Nuevo--}}
{{-- Formulario Modal Detalle--}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle rasgo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Identificador:</label>
          <b id="i"/>
        </div>
        <div class="form-group">
          <label for="">Nombre:</label>
          <b id="nom"/>
        </div>
    </div>
    </div>
  </div>
</div>
{{-- Fin Formulario Modal Detalle--}}
{{-- Formulario Modal Editar--}}
<div id="myModal"class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Editar rasgo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" style="display:none"></div>
          <form class="form-horizontal" role="modal">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">Identificador</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" name="id" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"for="nombre">Nombre</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="n" name="nombre">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-warning edit" data-dismiss="modal">
            <img src="{{asset('img/save.png')}}"
            class="ico"
            alt="Guardar" />
          </button>
          <button type="button" class="btn btn-outline-warning" data-dismiss="modal">
            <img src="{{asset('img/close.png')}}"
            class="ico"
            alt="Cerrrar" />
          </button>
        </div>
      </div>
    </div>
</div>
{{-- Fin Formulario Modal Editar--}}
@endsection
