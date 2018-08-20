<!-- Comentario HTML -->
{{-- Comentario de Blade--}}
@extends('layouts.master')
@section('titulo','Lista de VideoJuegos')
@section('contenido')
<!--  <h1>Lista de VideoJuegos<h1>
{{--
    {{"Mensaje"}}
    {{ 10==10?"Es igual":"No es igual"}}
    {{"<h2>XSS</h2>"}}
    {!!"<h2>XSS</h2>"!!}
  {!!"<script>alert('CSRF')</script>"!!}
  --}}
-->
<div class="row">
<div class="col-lg-12">
<h2>Lista de VideoJuegos</h2>
</div>
</div>
<div class="row">
@foreach ($videojuegos as $vj)
<div class="col">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $vj->nombre}}</h5>
    </div>
    <img src="{{asset('storage/'.$vj->imagen)}}"
    class="img-thumbnail img-fluid"
    alt="{{ $vj->nombre}}" />

    <div class="card-body">
      <p class="card-text">
      {{ $vj->descripcion}}</p>
      <!--Listar plataformas-->
      <p class="card-text">
                @foreach($vj->plataformas as $plataforma)
                  <span class="badge badge-pill badge-info">
                    {{ $plataforma->nombre }}</span>
                @endforeach
            </p>

      <a href="{{route('vj.videojuego',['id'=>$vj->id]) }}" class="btn btn-primary">Ver</a>
    </div>
  </div>
</div>
@endforeach
</div>
<div class="row">
  <div class="col-md-12 text-center">
    {{ $videojuegos->links() }}
  </div>
</div>


@endsection
