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

Route::redirect('/aplicacion', 'apEco/login', 301)->name('mainAppRoute');



//This group is only used to show the users the correct security
Route::group(['prefix'=>'apEco'],function(){

Route::get('/', function () {return view('app/dashboard/general');})->name('app.main'); //Main
Route::get('/myProfile', function () {return view('app.security.myProfile');})->name('app.myProfile'); //MyProfile

//Security (Login / Logout / ChangePassword)
Route::get('/login', function () {return view('app/security/login');})->name('security.startLogin');
Route::post('/login','Security@doLogin')->name('security.doLogin');
Route::get('/logout','Security@doLogout')->name('security.doLogout');
Route::get('/register', function () {return view('app/security/register');})->name('security.startRegister');
Route::post('/register','Security@doRegister')->name('security.doRegister');
Route::post('/password','Security@doChangePassword')->name('security.doChangePassword');

//Grupo para los mantenimientos del sistema
Route::group(['prefix'=>'CRUD'],function(){

  //CRUD relacionado al centro de acopio
  Route::group(['prefix'=>'CentroAcopio'],function(){
    Route::get('/list','collCntrController@index')->name('CRUD.collCenter.index');
    Route::get('/add','collCntrController@create')->name('CRUD.collCenter.create');

    Route::post('/edit','collCntrController@edit')->name('CRUD.collCenter.edit');
    Route::post('/store','collCntrController@store')->name('CRUD.collCenter.store');

    Route::get('/reports',function () {return view('app.CRUD.collectionCenter.report');})->name('CRUD.collCenter.startReporting');
    Route::post('/reports','collCntrController@doReporting')->name('CRUD.collCenter.doReporting');
  });

  //CRUD relacionado al material reciclable
  Route::group(['prefix'=>'MaterialReciclable'],function(){
    Route::get('/list','materialsController@index')->name('CRUD.MaterialReciclable.index');
    Route::get('/add','materialsController@create')->name('CRUD.MaterialReciclable.create');
    Route::post('/edit','materialsController@edit')->name('CRUD.MaterialReciclable.edit');
    Route::post('/store','materialsController@store')->name('CRUD.MaterialReciclable.store');
  });

  //CRUD relacionado a los cupones de canje
  Route::group(['prefix'=>'CuponesDeCanje'],function(){
    Route::get('/list','couponController@index')->name('CRUD.CuponesDeCanje.index');
    Route::get('/add','couponController@create')->name('CRUD.CuponesDeCanje.create');
    Route::post('/edit','couponController@edit')->name('CRUD.CuponesDeCanje.edit');
    Route::post('/store','couponController@store')->name('CRUD.CuponesDeCanje.store');
  });

  //CRUD relacionado a los usuaiors
  Route::group(['prefix'=>'GestionDeUsuarios'],function(){
    Route::get('/list/{role?}','userMasterController@list')->name('CRUD.GestionDeUsuarios.list');
    Route::get('/add/{role?}','userMasterController@create')->name('CRUD.GestionDeUsuarios.create');

    Route::post('/edit','userMasterController@edit')->name('CRUD.GestionDeUsuarios.edit');
    Route::post('/store','userMasterController@store')->name('CRUD.GestionDeUsuarios.store');

    Route::get('/getUser/{uname?}','userMasterController@getUserWithWallet')->name('CRUD.GestionDeUsuarios.getUserWithWallet');
  });

  //CRUD relacionado a los usuaiors
  Route::group(['prefix'=>'CanjeoMateriales'],function(){
    Route::get('/','walletController@startRedeemMaterials')->name('CRUD.CanjeoMateriales.startRedeem');
    Route::post('/','walletController@doRedeemMaterials')->name('CRUD.CanjeoMateriales.doRedeem');
  });


});

//Grupo para las rutas del cliente cuando esta loggeado
Route::group(['prefix'=>'client'],function(){
  Route::group(['prefix'=>'wallet'],function(){
    Route::get('',function () {return view('app.wallet.index');})->name('client.wallet.index');
  });
});

});
