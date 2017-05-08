<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('login', 'ApiController@login');

Route::get('getMesas', 'ApiController@getMesas');

Route::get('mesaInactiva', 'ApiController@mesaInactiva');

Route::get('mesaActiva', 'ApiController@mesaActiva');

Route::get('getCuentas', 'ApiController@getCuentas');

Route::get('makeCuenta', 'ApiController@makeCuenta');

Route::get('cuentaInactiva', 'ApiController@cuentaInactiva');

Route::get('getProductos', 'ApiController@getProductos');

Route::get('makeProductoCuenta', 'ApiController@makeProductoCuenta');

Route::get('getProductosCuentas', 'ApiController@getProductosCuentas');

Route::get('setTotales', 'ApiController@setTotales');

Route::get('getCuentasInactivas', 'ApiController@getCuentasInactivas');
