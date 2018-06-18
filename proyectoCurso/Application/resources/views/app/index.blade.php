@extends('app.layout._app')
@section('title',"Home")
@section('content')
<div class="row">
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-chart text-warning"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Number</p>
              <h4 class="card-title">150GB</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i> Update Now
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-light-3 text-success"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Revenue</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i> Last day
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-vector text-danger"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Errors</p>
              <h4 class="card-title">23</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-clock-o"></i> In the last hour
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-favourite-28 text-primary"></i>
            </div>
          </div>
          <div class="col-7">
            <div class="numbers">
              <p class="card-category">Followers</p>
              <h4 class="card-title">+45K</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i> Update now
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">Global Sales by Top Locations</h4>
        <p class="card-category">All products that were shipped</p>
      </div>
      <div class="card-body ">
        <div class="row">
          <div class="col-md-6">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="flag">
                        <img src="{{asset('app/')}}img/flags/US.png" </div>
                      </td>
                      <td>USA</td>
                      <td class="text-right">
                        2.920
                      </td>
                      <td class="text-right">
                        53.23%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{asset('app/')}}img/flags/DE.png" </div>
                        </td>
                        <td>Germany</td>
                        <td class="text-right">
                          1.300
                        </td>
                        <td class="text-right">
                          20.43%
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="flag">
                            <img src="{{asset('app/')}}img/flags/AU.png" </div>
                          </td>
                          <td>Australia</td>
                          <td class="text-right">
                            760
                          </td>
                          <td class="text-right">
                            10.35%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{asset('app/')}}img/flags/GB.png" </div>
                            </td>
                            <td>United Kingdom</td>
                            <td class="text-right">
                              690
                            </td>
                            <td class="text-right">
                              7.87%
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="flag">
                                <img src="{{asset('app/')}}img/flags/RO.png" </div>
                              </td>
                              <td>Romania</td>
                              <td class="text-right">
                                600
                              </td>
                              <td class="text-right">
                                5.94%
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="flag">
                                  <img src="{{asset('app/')}}img/flags/BR.png" </div>
                                </td>
                                <td>Brasil</td>
                                <td class="text-right">
                                  550
                                </td>
                                <td class="text-right">
                                  4.34%
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6 ml-auto mr-auto">
                        <div id="worldMap" style="height: 300px;"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="card ">
                  <div class="card-header ">
                    <h4 class="card-title">Email Statistics</h4>
                    <p class="card-category">Last Campaign Performance</p>
                  </div>
                  <div class="card-body ">
                    <div id=chartEmail class="ct-chart ct-perfect-fourth"></div>
                  </div>
                  <div class="card-footer ">
                    <div class="legend">
                      <i class="fa fa-circle text-info"></i> Open
                      <i class="fa fa-circle text-danger"></i> Bounce
                      <i class="fa fa-circle text-warning"></i> Unsubscribe
                    </div>
                    <hr>
                    <div class="stats">
                      <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card ">
                  <div class="card-header ">
                    <h4 class="card-title">Users Behavior</h4>
                    <p class="card-category">24 Hours performance</p>
                  </div>
                  <div class="card-body ">
                    <div id=chartHours class="ct-chart"></div>
                  </div>
                  <div class="card-footer ">
                    <div class="legend">
                      <i class="fa fa-circle text-info"></i> Open
                      <i class="fa fa-circle text-danger"></i> Click
                      <i class="fa fa-circle text-warning"></i> Click Second Time
                    </div>
                    <hr>
                    <div class="stats">
                      <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card ">
                  <div class="card-header ">
                    <h4 class="card-title">2017 Sales</h4>
                    <p class="card-category">All products including Taxes</p>
                  </div>
                  <div class="card-body ">
                    <div id="chartActivity" class="ct-chart"></div>
                  </div>
                  <div class="card-footer ">
                    <div class="legend">
                      <i class="fa fa-circle text-info"></i> Tesla Model S
                      <i class="fa fa-circle text-danger"></i> BMW 5 Series
                    </div>
                    <hr>
                    <div class="stats">
                      <i class="fa fa-check"></i> Data information certified
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card  card-tasks">
                  <div class="card-header ">
                    <h4 class="card-title">Tasks</h4>
                    <p class="card-category">Backend development</p>
                  </div>
                  <div class="card-body ">
                    <div class="table-full-width">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign"></span>
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign"></span>
                                </label>
                              </div>
                            </td>
                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign"></span>
                                </label>
                              </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" checked>
                                  <span class="form-check-sign"></span>
                                </label>
                              </div>
                            </td>
                            <td>Create 4 Invisible User Experiences you Never Knew About</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign"></span>
                                </label>
                              </div>
                            </td>
                            <td>Read "Following makes Medium better"</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign"></span>
                                </label>
                              </div>
                            </td>
                            <td>Unfollow 5 enemies from twitter</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                    </div>
                  </div>
                </div>
              </div>
            </div>



@endsection()





            <!--
            <!doctype html>
            <html lang="{{ app()->getLocale() }}">
            <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Laravel</title>

            <!-- Fonts
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

            <!-- Styles
            <style>
            html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
          }

          .full-height {
          height: 100vh;
        }

        .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
      }

      .position-ref {
      position: relative;
    }

    .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
  text-align: center;
}

.title {
font-size: 84px;
}

.links > a {
color: #636b6f;
padding: 0 25px;
font-size: 12px;
font-weight: 600;
letter-spacing: .1rem;
text-decoration: none;
text-transform: uppercase;
}

.m-b-md {
margin-bottom: 30px;
}
</style>
</head>
<body>
<div class="flex-center position-ref full-height">
@if (Route::has('login'))
<div class="top-right links">
@auth
<a href="{{ url('/home') }}">Home</a>
@else
<a href="{{ route('login') }}">Login</a>
<a href="{{ route('register') }}">Register</a>
@endauth
</div>
@endif

<div class="content">
<div class="title m-b-md">
Laravel
</div>

<div class="links">
<a href="https://laravel.com/docs">Documentation</a>
<a href="https://laracasts.com">Laracasts</a>
<a href="https://laravel-news.com">News</a>
<a href="https://forge.laravel.com">Forge</a>
<a href="https://github.com/laravel/laravel">GitHub</a>
</div>
</div>
</div>
</body>
</html> -->
