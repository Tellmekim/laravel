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

Route::post('postLogin','Home\LoginController@postLogin')->name('postLogin');  
Route::post('canvasData','Home\IndexController@canvasData')->name('canvasData');  
Route::post('postRegister','Home\LoginController@postRegister')->name('postRegister');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});