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

Route::get('/', function () {
    return view('propiedad.index');
})->name("LISTAPROPIEDADES");

Route::get('/gestion',function(){
    return view('admin.index');
})->name('GESTIONPROPIEDADES');


Route::prefix('propiedad')->group(function () {
    Route::get('list', 'PropiedadController@index')->name("ListarPropiedad");
    Route::get('create', 'PropiedadController@create')->name("CrearPropiedad");
    Route::put('store', 'store')->name("StorePropiedad");
});
