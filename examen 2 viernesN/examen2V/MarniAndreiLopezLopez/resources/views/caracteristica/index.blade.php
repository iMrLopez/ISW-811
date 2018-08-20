@extends('layouts.master')
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <h1>Características</h1>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th>Nombre</th>
        <th>Fecha de Creación</th>
        <th class="text-center" width="150px">
          Acciones
        </th>
      </tr>
      @csrf
      @foreach ($caracteristica as $item)
        <tr class="caracteristica{{$item->id}}">
          <td>{{ $item->nombre }}</td>
          <td>{{ $item->created_at }}</td>
          <td>
            <a href="#" class="ver-detalle btn btn-outline-info" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-detalle="{{$item->detalle}}" >
              <img src="{{asset('img/view-2.png')}}"
              class="ico"
              alt="Ver" />
            </a>
            <a href="#" class="editC btn btn-outline-warning" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-detalle="{{$item->detalle}}" >
              <img src="{{asset('img/edit.png')}}"
              class="ico"
              alt="Editar" />
            </a>

          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$caracteristica->links()}}
</div>
{{-- Formulario Modal Detalle--}}
<div id="ver" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle característica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Identificador:</label>
          <b id="identificador"/>
        </div>
        <div class="form-group">
          <label for="">Nombre:</label>
          <b id="nomb"/>
        </div>
        <div class="form-group">
          <label for="">Descripcion:</label>
          <b id="detalle"/>
        </div>
    </div>
    </div>
  </div>
</div>
{{-- Fin Formulario Modal Detalle--}}
{{-- Formulario Modal Editar--}}
<div id="modal-Actualizar"class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Editar característica</h5>
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
                <input type="text" class="form-control" id="idC" name="idC" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"for="nombre">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nomC" name="nomC">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"for="detC">Detalle</label>
              <div class="col-sm-10">
                <textarea
                class="form-control" id="detC" name="detC"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-warning editar" data-dismiss="modal">
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
