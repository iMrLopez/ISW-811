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

Route::get('/', 'VideojuegoController@getIndex')->name('vj.index');

Route::get('acerca', function () {
    return view('otros.acerca-de');
})->name('otros.acerca-de');

Route::get('videojuego/{id}',
[
  'uses'=>'VideojuegoController@getVideojuego',
  'as'=>'vj.videojuego'
]
);

Route::get('videojuego/{id}/like',
[
  'uses'=>'VideojuegoController@getLikeVideojuego',
  'as'=>'vj.videojuego.like'
]
);

/*Administrador */
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
  Route::get('',
  [
    'uses'=>'VideojuegoController@getAdminIndex'
  ]
  )->name('admin.index');
  Route::get('create',
  [
    'uses'=>'VideojuegoController@getAdminCreate',
    'as'=>'admin.create',
    'middleware'=>'can:create-vj'
  ]
  );
  Route::get('edit/{vj}',
  [
    'uses'=>'VideojuegoController@getAdminEdit',
    'as'=>'admin.edit',
    'middleware'=>'can:update-vj,vj'
  ]
  );

  Route::post('create',
  [
      'uses' => 'VideojuegoController@vjAdminCreate',
      'as' => 'admin.create',
      'middleware'=>'can:create-vj'
  ]
  );
  Route::post('edit/{vj}', [
      'uses' => 'VideojuegoController@vjAdminUpdate',
      'as' => 'admin.update',
      'middleware'=>'can:update-vj,vj'
  ]);

});
Route::get('publicar/{vj}',[
  'uses' => 'VideojuegoController@publicar',
  'as' => 'publish.vj',
  'middleware'=>'can:publish-vj'
]);
Route::group(['prefix'=>'plataforma','middleware'=>'auth'], function() {
  Route::get('',
  [
      'uses' => 'PlataformaController@index',
      'as' => 'plataforma.index'
  ]
  );
  Route::post('update',
  [
      'uses' => 'PlataformaController@update',
      'as' => 'update.plataforma'
  ]
  );
  Route::post('store',
  [
      'uses' => 'PlataformaController@store',
      'as' => 'store.plataforma'
  ]
  );
      });


Auth::routes();
