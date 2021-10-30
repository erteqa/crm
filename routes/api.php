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

Route::prefix('admin')->group(function () {
    Route::post('register', 'Api\Admin\AdminController@register');
    Route::post('login', 'Api\Admin\AdminController@login');
//    Route::get('open', 'DataController@open');
    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'Api\Admin\AdminController@getAuthenticatedUser');
//        Route::get('closed', 'DataController@closed');
   });
});

Route::prefix('customer')->group(function () {
    Route::post('register', 'Api\Customer\CustomerController@register');
    Route::post('login', 'Api\Customer\CustomerController@login');
//   Route::get('open', 'DataController@open');
 Route::group(['middleware' => ['jwt.verify','auth:customers']], function() {
        Route::get('user', 'Api\Customer\CustomerController@getAuthenticatedUser');
//      Route::get('closed', 'DataController@closed');
 });
});
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
