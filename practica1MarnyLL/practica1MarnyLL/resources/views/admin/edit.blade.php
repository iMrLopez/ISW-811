@extends('layouts.admin')

@section('contenido')
  @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
              <div class="form-group">
                <label>Tipo</label>
                <select name="" class="custom-select">
<!--Listas de Tipos-->
                  <option value=""
                    >Nombre Tipo</option>
<!--Listas de Tipos-->
               </select>
             </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input
                    type="text"
                    class="form-control"
                    id=""
                    name=""
                    value="">
                </div>
                <div class="form-group">
                    <label>Ubicación</label>
                    <textarea
                    class="form-control"
                    id=""
                    name=""></textarea>
                </div>
                <div class="form-group">
                    <label>Cantidad de Habitaciones</label>
                    <input
                    type="number"
                    class="form-control"
                    id=""
                    name=""
                    value="">
                </div>
                <div class="form-group">
                    <label>Cantidad de Carros</label>
                    <input
                    type="number"
                    class="form-control"
                    id=""
                    name=""
                    value="">
                </div>
                <div class="form-group">
<!--Listas de Rasgos-->
                    <div class="form-check">
                           <input
                           class="form-check-input" type="checkbox"
                           name=""
                           value=""
                           />
                         <label class="form-check-label">Nombre de Razgo</label>
                   </div>
<!--Listas de Rasgos-->
               </div>
                <input type="hidden" name="id" value="">
                @csrf
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
