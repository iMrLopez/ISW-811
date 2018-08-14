@extends('layouts.admin')

@section('contenido')
  @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.update','propiedad'=>$prop->id) }}"
            method="post">
              <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" class="custom-select">

              @foreach($tipos as $tipo)
                  <option value="{{ $tipo->id }}"
                    {{ ($prop->tipo->id==$tipo->id) ? 'selected' : '' }}
                    >{{ $tipo->nombre }}</option>
              @endforeach
               </select>
             </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    value="{{$prop->nombre}}">
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <textarea
                    class="form-control"
                    id="ubicacion"
                    name="ubicacion">{{$prop->ubicacion}}</textarea>
                </div>
                <div class="form-group">
                    <label for="cantidadHabitaciones">Cantidad de Habitaciones</label>
                    <input
                    type="number"
                    class="form-control"
                    id="cantidadHabitaciones"
                    name="cantidadHabitaciones"
                    value="{{$prop->cantidadHabitaciones}}">
                </div>
                <div class="form-group">
                    <label for="cantidadCarros">Cantidad de Carros</label>
                    <input
                    type="number"
                    class="form-control"
                    id="cantidadCarros"
                    name="cantidadCarros"
                    value="{{$prop->cantidadCarros}}">
                </div>
                <div class="form-group">
                  <label >Rasgos</label>
                @foreach($rasgos as $rasgo)
                    <div class="form-check">
                           <input
                           class="form-check-input" type="checkbox"
                           name="rasgos[]"
                           value="{{ $rasgo->id }}"
                           {{ $prop->rasgos->contains($rasgo->id) ? 'checked' : '' }}
                           />
                         <label class="form-check-label">{{ $rasgo->nombre }}</label>
                   </div>
               @endforeach
               </div>

                <input type="hidden" name="id" value="{{ $prop->id }}">
                @csrf
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
