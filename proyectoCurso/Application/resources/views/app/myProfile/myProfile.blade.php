@extends('layouts._app')
@section('title',"Mi Perfil")
@section('content')
<div class="row">
  <div class="col-md-8">
    @include('app.myProfile.changepass')
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
            <h5 class="title">{{Auth::user()->name}}</h5>
          </a>
          <p class="description">
            {{Auth::user()->username}}
          </p>
        </div>
        @if(Auth::user()->role == 'Client')
        <p class="description text-center">
          {{Auth::user()->email}}
          <br> {{Auth::user()->name->address}}
          <br> {{Auth::user()->name->telephone}}
          <br> {{Auth::user()->name->role}}
        </p>
        @endif
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
