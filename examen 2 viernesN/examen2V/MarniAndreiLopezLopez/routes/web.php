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

Route::get('', [
  'uses'=>'HeladoController@getIndex',
  'as'=>'admin.index'
]
);
//Admin
Route::group(['prefix'=>'admin'], function(){
  Route::get('', [
    'uses'=>'HeladoController@getIndex',
    'as'=>'helado.index'
  ]
  );
  Route::get('votar/{id}/{cantidad}',
  [
    'uses'=>'HeladoController@getVotar',
    'as'=>'helado.votar'
  ]
  );
  Route::get('create',
  [
    'uses'=>'HeladoController@getCrear',
    'as'=>'helado.create',
    'middleware'=>'can:crearH'
  ])->middleware('auth');
  Route::get('edit/{hela}',
  [
    'uses'=>'HeladoController@getEditar',
    'as'=>'helado.editar',
    'middleware'=>'can:actualizarH,hela'
  ]
  )->middleware('auth');
  Route::post('create',
  [
      'uses' => 'HeladoController@postInsert',
      'as' => 'helado.insert',
      'middleware'=>'can:crearH'
  ]
  )->middleware('auth');
  Route::post('edit/{hela}',
  [
    'uses'=>'HeladoController@postUpdate',
    'as'=>'helado.update',
    'middleware'=>'can:actualizarH,hela'
  ]
  )->middleware('auth');
  Route::get('grafico', [
      'uses' => 'HeladoController@grafico',
      'as' => 'helado.grafico',
      'middleware'=>'can:graficoH'
  ])->middleware('auth');
  Route::get('pdf',
  [
    'uses'=>'HeladoController@descargarPDF',
    'as'=>'helado.pdf'
  ])->middleware('auth');
  Route::get('caracteristica',
  [
      'uses' => 'CaracteristicaController@index',
      'as' => 'caracteristica.index'
  ]
  )->middleware('auth');
  Route::post('update-caracteristica',
  [
      'uses' => 'CaracteristicaController@update',
      'as' => 'update.caracteristica'
  ]
  )->middleware('auth');
});

Auth::routes();
