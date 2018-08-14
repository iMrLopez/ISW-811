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

Route::get('/', 'PropiedadController@getIndex')->name('prop.index');
Route::post('propiedades/',
[
  'uses'=>'PropiedadController@getPropiedadesTipo',
  'as'=>'prop.propiedad.tipo'
]
);

Route::get('propiedad/{id}',
[
  'uses'=>'PropiedadController@getPropiedad',
  'as'=>'prop.propiedad'
]
);
//Admin
Route::group(['prefix'=>'admin'], function(){
  Route::get('', [
    'uses'=>'PropiedadController@getAdminIndex',
    'as'=>'admin.index'
  ]
  );

  Route::get('create',
  [
    'uses'=>'PropiedadController@getAdminCreate',
    'as'=>'admin.create'
  ])->middleware('can:nueva-propiedad');

  Route::get('edit/{propiedad}',
  [
    'uses'=>'PropiedadController@getAdminEdit',
    'as'=>'admin.edit'
  ]
  )->middleware('can:actualizar-propiedad,propiedad');

  Route::post('create',
  [
      'uses' => 'PropiedadController@propAdminCreate',
      'as' => 'admin.create'
  ]
  )->middleware('can:nueva-propiedad');

  Route::post('edit/{propiedad}',
  [
    'uses'=>'PropiedadController@PropAdminUpdate',
    'as'=>'admin.update'
  ]
  )->middleware('can:actualizar-propiedad,propiedad'); //Como obtengo el post? con $Request()->user_id(); ??

  Route::get('grafico', [
      'uses' => 'PropiedadController@grafico',
      'as' => 'admin.grafico'
  ]);

  Route::get('pdf',
  [
    'uses'=>'PropiedadController@descargarPDF',
    'as'=>'admin.pdf'
  ]);

  Route::get('rasgo',
  [
      'uses' => 'RasgoController@index',
      'as' => 'rasgo.index'
  ]
  );

  Route::post('update-rasgo',
  [
      'uses' => 'RasgoController@update',
      'as' => 'update.rasgo'
  ]
  );

  Route::post('store-rasgo',
  [
      'uses' => 'RasgoController@store',
      'as' => 'store.rasgo'
  ]
  );
});

Auth::routes();
