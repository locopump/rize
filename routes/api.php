<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'intranet', 'namespace' => 'API\Intranet'], function () {
    Route::group(['prefix' => 'administracion', 'namespace' => 'Administracion'], function () {
        Route::group(['prefix' => 'general', 'namespace' => 'General'], function () {
            // Modalidad Transporte
            Route::get('areas/{id?}', 'AreasController@getAreas');
            Route::delete('areas/delete/{id}', 'AreasController@deleteArea');
        });
    });
});
