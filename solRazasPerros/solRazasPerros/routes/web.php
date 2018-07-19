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
Route::get('/',
[
  'uses'=>'RazaPerroController@getIndex',
  'as'=>'rp.index'
]);

Route::get('/acerca-de', function () {
    return view('otros.acerca-de');
})->name('o.acerca-de');

Route::get('razaPerro/{id}',
[
  'uses'=>'RazaPerroController@getRazaPerro',
  'as'=>'rp.detalle'
]);

Route::get('/razas-temperamento/{id?}',
[
  'uses'=>'RazaPerroController@getRazaxTempemperamento',
  'as'=>'rp.temperamentos'
]);


Route::get('/tamanos}',
[
  'uses'=>'RazaPerroController@getCantidadRazaxTamano',
  'as'=>'rp.tamanos'
]);


//Admin
Route::group(['prefix'=>'admin'], function(){


  Route::get('', [
     'uses'=>'RazaPerroController@getAdminIndex',
     'as'=>'admin.index'
   ]);

   Route::get('create',
   [
     'uses'=>'RazaPerroController@getAdminCreate',
     'as'=>'admin.create'
   ]);

   Route::get('edit/{id}',
   [
     'uses'=>'RazaPerroController@getAdminEdit',
     'as'=>'admin.edit'
   ]
   );
   Route::post('create',
   [
       'uses' => 'RazaPerroController@rpAdminCreate',
       'as' => 'admin.create'
   ]
   );
   Route::post('edit', [
       'uses' => 'RazaPerroController@rpAdminUpdate',
       'as' => 'admin.update'
   ]);

});
