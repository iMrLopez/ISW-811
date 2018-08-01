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

  //Security register
    Route::get('/register', function () {return view('app/security/register');})->name('security.startRegister');
    Route::post('/register','Security@doRegister')->name('security.doRegister');

  //Security change password
  //Route::get('/password', function () {return view('app.security.chgpass');})->name('security.startPasswordChange');
  Route::post('/password','Security@doChangePassword')->name('security.doChangePassword');

  //Main
Route::get('/main', function () {return view('app/dashboard/general'/*.session()->get('user.instance.role')*/);})->name('app.main');

Route::get('/myProfile', function () {return view('app.security.myProfile');})->name('app.myProfile');

  Route::group(['prefix'=>'CRUD'],function(){

    Route::group(['prefix'=>'CentroAcopio'],function(){
      Route::get('/list','collCntrController@index')->name('CRUD.collCenter.index');
      Route::get('/add','collCntrController@create')->name('CRUD.collCenter.create');
      Route::post('/edit','collCntrController@edit')->name('CRUD.collCenter.edit');
      Route::post('/store','collCntrController@store')->name('CRUD.collCenter.store');
    });

    Route::group(['prefix'=>'MaterialReciclable'],function(){
      Route::get('/list','materialsController@index')->name('CRUD.MaterialReciclable.index');
      Route::get('/add','materialsController@create')->name('CRUD.MaterialReciclable.create');
      Route::post('/edit','materialsController@edit')->name('CRUD.MaterialReciclable.edit');
      Route::post('/store','materialsController@store')->name('CRUD.MaterialReciclable.store');
    });

    Route::group(['prefix'=>'CuponesDeCanje'],function(){
      Route::get('/list','couponController@index')->name('CRUD.CuponesDeCanje.index');
      Route::get('/add','couponController@create')->name('CRUD.CuponesDeCanje.create');
      Route::post('/edit','couponController@edit')->name('CRUD.CuponesDeCanje.edit');
      Route::post('/store','couponController@store')->name('CRUD.CuponesDeCanje.store');
    });

    Route::group(['prefix'=>'GestionDeUsuarios'],function(){
      Route::get('/list/{role?}','userMasterController@list')->name('CRUD.GestionDeUsuarios.list');
      Route::get('/add/{role?}','userMasterController@create')->name('CRUD.GestionDeUsuarios.create');

      Route::post('/edit','userMasterController@edit')->name('CRUD.GestionDeUsuarios.edit');
      Route::post('/store','userMasterController@store')->name('CRUD.GestionDeUsuarios.store');

    });

    Route::get('/main', function () {return view('app/dashboard/'.session()->get('user.instance.role'));})->name('CRUD.main');
  });

  Route::group(['prefix'=>'client'],function(){

    Route::group(['prefix'=>'wallet'],function(){
      Route::get('',function () {return view('app.wallet.index');})->name('client.wallet.index');
    });

    Route::get('/main', function () {return view('app/dashboard/'.session()->get('user.instance.role'));})->name('CRUD.main');
  });

});
