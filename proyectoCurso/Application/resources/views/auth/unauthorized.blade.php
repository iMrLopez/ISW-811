@extends('layouts._login')
@section('title',"Iniciar Sesion")

@section('content')
<div class="full-page  section-image" data-color="black" data-image="{{asset('app/img/login.jpg')}}">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="content">
    <div class="container">
      <div class="col-md-4 col-sm-6 ml-auto mr-auto">
        <div class=”title m-b-md”>
          You cannot access this page! This is for only ‘{{$role}}’”
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
