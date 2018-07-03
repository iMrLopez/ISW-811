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

Route::get('/{id?}', 'PrincipalController@index')->name('helado.principal');
Route::get('/votar/{id}/{voto}', 'PrincipalController@vote')->name('helado.votar');


Route::get('/editar/{id}', 'PrincipalController@getEditar')->name('helado.editar');

Route::post('/editar', 'PrincipalController@postUpdate')->name('helado.update');
