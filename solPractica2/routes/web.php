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
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
  Route::get('', [
    'uses'=>'PropiedadController@getAdminIndex',
    'as'=>'admin.index'
  ]
  );

  Route::get('create',
  [
    'uses'=>'PropiedadController@getAdminCreate',
    'as'=>'admin.create',
    'middleware'=>'can:nueva-propiedad'
  ]);
  Route::get('edit/{prop}',
  [
    'uses'=>'PropiedadController@getAdminEdit',
    'as'=>'admin.edit',
    'middleware'=>'can:actualizar-propiedad,prop'
  ]
  );
  Route::post('create',
  [
      'uses' => 'PropiedadController@propAdminCreate',
      'as' => 'admin.create',
      'middleware'=>'can:nueva-propiedad'
  ]
  );
  Route::post('edit/{prop}',
  [
    'uses'=>'PropiedadController@PropAdminUpdate',
    'as'=>'admin.update',
    'middleware'=>'can:actualizar-propiedad,prop'
  ]
  );
  Route::get('grafico', [
      'uses' => 'PropiedadController@grafico',
      'as' => 'admin.grafico',
      'middleware'=>'can:grafico-propiedades'
  ]);
  Route::get('pdf',
  [
    'uses'=>'PropiedadController@descargarPDF',
    'as'=>'admin.pdf',
    'middleware'=>'can:pdf-propiedades'
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
