@extends('layouts.master')
@section('titulo', 'Información Video Juego')
@section('contenido')
  <div class="jumbotron">
    <h1 class="display-3">{{$vj->nombre}}</h1>
    <span class="badge badge-dark">
      {{ count($vj->likes) }} Likes  |
      <a href="{{ route('vj.videojuego.like',['id' => $vj->id])}}" >Like</a>
    </span>
    <p class="lead">{{$vj->descripcion}}</p>
    {{--$vj->nombre--}}
</div>
@endsection
