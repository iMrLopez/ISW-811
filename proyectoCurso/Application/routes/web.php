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

Route::get('/', 'SiteController@index')->name('site.index');

//This group is only used to show the users the correct security
Route::group(['prefix'=>'appEco'],function(){

  Route::get('/', 'HomeController@index')->name('app.appEco'); //Main

  Route::get('/myProfile', function () {return view('app.myProfile.myProfile');})->name('app.myProfile'); //MyProfile
  Route::post('/password','UserController@doChangePassword')->name('security.doChangePassword'); //Change password from MyProfile

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

    //CRUD relacionado a los Product
    Route::group(['prefix'=>'Product'],function(){
      Route::get('/list','ProductController@index')->name('CRUD.Product.index');
      Route::get('/add','ProductController@create')->name('CRUD.Product.create');
      Route::post('/edit','ProductController@edit')->name('CRUD.Product.edit');
      Route::post('/store','ProductController@store')->name('CRUD.Product.store');
    });

    //CRUD relacionado a los usuarios
    Route::group(['prefix'=>'GestionDeUsuarios'],function(){
      Route::get('/list/{role?}','UserController@list')->name('CRUD.GestionDeUsuarios.list');
      Route::get('/add','UserController@create')->name('CRUD.GestionDeUsuarios.create');

      Route::post('/edit','UserController@edit')->name('CRUD.GestionDeUsuarios.edit');
      Route::post('/store','UserController@store')->name('CRUD.GestionDeUsuarios.store');

      Route::get('/getUserWallet/{username?}','UserController@getUserWithWallet')->name('CRUD.GestionDeUsuarios.getUserWithWallet');
    });

    //CRUD relacionado a los CanjeoMateriales
    Route::group(['prefix'=>'CanjeoMateriales'],function(){
      Route::get('/','walletController@startRedeemMaterials')->name('CRUD.CanjeoMateriales.startRedeem');
      Route::post('/','walletController@doConvertMaterials')->name('CRUD.CanjeoMateriales.doRedeem');
    });

    //CRUD relacionado a los CanjeoMateriales
    Route::group(['prefix'=>'CanjeoCupones'],function(){
      Route::get('',function () {return view('app.CRUD.walletDetail.redeemCoupon');})->name('CRUD.CanjeoCupones.startRedeem');
      Route::get('/{json?}','walletController@getCoupon')->name('CRUD.CanjeoCupones.getCouponData');
      Route::post('/redeem','walletController@redeemCoupon')->name('CRUD.CanjeoCupones.doRedeem');
    });

  });

  //Grupo para las rutas del cliente cuando esta loggeado
  Route::group(['prefix'=>'client'],function(){
    Route::group(['prefix'=>'wallet'],function(){
      Route::get('','walletController@doGetWalletStatus')->name('client.wallet.index');
    });

    Route::group(['prefix'=>'CuponCanje'],function(){
      Route::get('','walletController@startCreateCoupon')->name('client.coupon.startCreate');
      Route::post('','walletController@doCreateCoupon')->name('client.coupon.doCreate');
      Route::get('/listActive','walletController@getActiveCoupons')->name('client.coupon.getActiveCoupons');
    });

  });



});

Auth::routes();
