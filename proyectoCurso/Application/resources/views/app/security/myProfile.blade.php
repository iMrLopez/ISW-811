@extends('app.layout._app')
@section('title',"Mi Perfil")
@section('content')
<div class="row">
  <div class="col-md-8">
    @include('app.security.changepass')
  </div>
  <div class="col-md-4">
    <div class="card card-user">
      <div class="card-image">
        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="{{asset('app/img/faces/face-1.jpg')}}" alt="...">
            <h5 class="title">{{session()->get('user.instance.name')}}</h5>
          </a>
          <p class="description">
            {{session()->get('user.instance.uname')}}
          </p>
        </div>
        <p class="description text-center">
          {{session()->get('user.instance.email')}}
          <br> {{session()->get('user.instance.address')}}
          <br> {{session()->get('user.instance.telephone')}}
          <br> {{session()->get('user.instance.role')}}
        </p>
      </div>
      <hr>
      <div class="button-container mr-auto ml-auto">
        <br>&nbsp;
        Reciclar es lo mejor!
        <br>&nbsp;
      </div>
    </div>
  </div>
</div>
@endsection()
