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

Route::group(['middleware'=>'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('/home');

    Route::get('/', function () {
        return view('/home');
    });

    Route::resource('proveedores', 'ProveedorController');

    Route::resource('materiasprimas', 'MateriaPrimaController');

    Route::resource('tiposcantidad', 'TipoCantidadController');

    Route::resource('compras', 'CompraController');

    Auth::routes();

    Route::get('logout', function(){
        Auth::logout();
        return redirect()->route('/home');
    })->name('logout');

});

Auth::routes();
