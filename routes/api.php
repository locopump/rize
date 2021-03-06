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
            // Areas
            Route::get('areas/{id?}', 'AreasController@getAreasDetail');
            Route::delete('areas/delete/{id}', 'AreasController@deleteArea');
            Route::get('grupo/areas/{group_id?}', 'AreasController@getAreasByGroup');
            // Counts
            Route::get('counts/{id?}', 'CountsController@getCounts');
//            Route::delete('counts/delete/{id}', 'CountsController@deleteCount');
            Route::post('resumen/counts', 'CountsController@getResumenCounts');
            // Likes
            Route::get('likes/{id?}', 'LikesController@getLikes');
//            Route::delete('likes/delete/{id}', 'LikesController@deleteLike');
            Route::get('email-likes/{email?}', 'LikesController@getLikesByEmail');
            Route::get('gender-likes', 'LikesController@getLikesByGender');
            Route::get('tenant-likes', 'LikesController@getLikesByTenant');
            Route::get('brand-likes', 'LikesController@getLikesByBrand');
            // Pages
            Route::get('pages/{id?}', 'PagesController@getPages');
//            Route::delete('pages/delete/{id}', 'PagesController@deletePage');
            // Sales
//            Route::get('sales/{id?}', 'SalesController@getSales');
//            Route::delete('sales/delete/{id}', 'SalesController@deleteSale');
            Route::get('sales/ventas-modulo/list/{ss_tenant_name?}', 'SalesController@getVentasModulo');
            Route::post('sales/ventas-filtro/fecha/', 'SalesController@getVentasFecha');
            // SsTenants
            Route::get('sstenants/{id?}', 'SsTenantsController@getSsTenants');
//            Route::delete('sstenants/delete/{id}', 'SsTenantsController@deleteSsTenant');
            // Tenants
//            Route::get('tenants/{id?}', 'TenantsController@getTenants');
//            Route::delete('tenants/delete/{id}', 'TenantsController@deleteTenant');
            Route::get('tenants/categories/{category?}', 'TenantsController@getLocatariosCategoria');
            // Venues
            Route::get('venues/{id?}', 'VenuesController@getVenues');
//            Route::delete('venues/delete/{id}', 'VenuesController@deleteVenue');
            // Visitors
//            Route::get('visitors/{id?}', 'VisitorsController@getVisitors');
//            Route::delete('visitors/delete/{id}', 'VisitorsController@deleteVisitor');
            Route::get('visitors-resumen', 'VisitorsController@getResumenVisitors');
            // Visits
            Route::get('visits/{id?}', 'VisitsController@getVisits');
//            Route::delete('visits/delete/{id}', 'VisitsController@deleteVisit');
        });
    });
});
