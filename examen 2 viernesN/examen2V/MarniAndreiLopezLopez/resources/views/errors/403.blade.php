@extends('layouts.master')
@section('contenido')
<h2>{{ $exception->getMessage() }}</h2>
@endsection
