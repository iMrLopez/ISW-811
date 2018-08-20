@extends('layouts.master')
@section('contenido')

<div class="row">
<div class="col-lg-12">
<h2>Lista de Helados</h2>
</div>
</div>
<div class="row">

  <div class="col-12">
    <div class="row">
      @foreach ($listado as $elemento)
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="card-title">{{$elemento->nombre}}</h5>

              <small><b> {{$elemento->votos->count()}} voto(s) </b></small>
            </div>
            </div>
            <img src="{{URL::to('/').'/helados/'.$elemento->imagen}}">
            <div class="card-body">
            <div class=" justify-content-between" role="group" aria-label="Basic example">
              Votar:
              <a class="btn btn-info" href="{{ route('helado.votar', ['id' => $elemento->id,'puntos' =>1]) }}">+1</a>
              <a class="btn btn-info" href="{{ route('helado.votar', ['id' => $elemento->id,'puntos' =>3]) }}">+3</a>
            </div>
              <hr>
            <p class="card-text">
              <b>Precio: </b>{{$elemento->precioUnitario}}
            </p>
                <a class="btn btn-success" href="{{ route('helado.editar', ['id' => $elemento->id]) }}">Editar</a>
          </div>
        </div>
      </div>
      @endforeach
      {{ $listado->links() }}

    </div>
  </div>
</div>



<div class="row">
  <hr/>
  </div>
@endsection
