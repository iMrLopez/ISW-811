<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site/index');
});

/*Route::get('/plantillaapp', function () {
    return view('app/index');
});*/

Route::group(['prefix'=>'app'],function(){

  Route::get('/login', function () {
      return view('app/security/login');
  });

  Route::resource('users','UsersController');

});
