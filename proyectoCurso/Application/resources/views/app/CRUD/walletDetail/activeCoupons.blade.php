@extends('layouts._app')
@section('title',"Home")
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="card-image">
        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
            <h5 class="title">Mike Andrew</h5>
          </a>
          <p class="description">
            michael24
          </p>
        </div>
        <p class="description text-center">
          "Lamborghini Mercy
          <br> Your chick she so thirsty
          <br> I'm in that two seat Lambo"
        </p>
      </div>
      <hr>
      <div class="button-container mr-auto ml-auto">
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-facebook-square"></i>
        </button>
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-twitter"></i>
        </button>
        <button href="#" class="btn btn-simple btn-link btn-icon">
          <i class="fa fa-google-plus-square"></i>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection()
