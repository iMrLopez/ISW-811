@extends('layouts.master')
@section('contenido')

<div class="row justify-content-md-center">

    <div class="col-md-12">
      <h1>Sumatori a de votos por helados</h1>
      <div>{!! $chart->container() !!}</div>

  </div>

</div>
<script type="text/javascript" src="{{ URL::to('js/Chart.min.js') }}"></script>
{!! $chart->script() !!}

@endsection
