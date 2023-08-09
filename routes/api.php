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

Route::get('/settings/{id}', 'SettingController@show');
Route::post('/settings', 'SettingController@store');
Route::put('/settings/{id}', 'SettingController@update');
Route::delete('/settings/{id}', 'SettingController@destroy');
