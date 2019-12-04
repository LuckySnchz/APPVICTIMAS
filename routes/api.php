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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.auth')->get('/user', function () {
    return auth('api')->user();
});

Route::post('loginApi', 'ApiController@loginApi');
Route::get('consumirApi', 'ApiController@consumirApi');
Route::post('datos', 'ApiController@getDatos')->middleware('jwt.auth');
