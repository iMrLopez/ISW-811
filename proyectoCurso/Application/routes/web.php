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

Route::get('/', 'Site@index')->name('site.index');


Route::redirect('/aplicacion', '/app/login', 301)->name('mainAppRoute');

//This group is only used to show the users the correct security
Route::group(['prefix'=>'app'],function(){

  //Security (Login / Logout)
  Route::post('/login','Security@doLogin')->name('security.doLogin');
  Route::get('/login', function () {return view('app/security/login');})->name('security.startLogin');
  Route::get('/logout','Security@doLogout')->name('security.doLogout');

  //Main
  Route::get('/main', function () {return view('app/dashboard/general'/*.session()->get('user.type')*/);})->name('app.main');
  Route::get('/myProfile', function () {return view('app/dashboard/'.session()->get('user.type'));})->name('app.myProfile');

  Route::group(['prefix'=>'CRUD'],function(){
    Route::get('/main', function () {return view('app/dashboard/'.session()->get('user.type'));})->name('CRUD.main');
  });

});
