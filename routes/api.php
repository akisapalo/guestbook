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

Route::post('/guest/create', 'GuestController@store');
Route::get('/guest/edit/{id}', 'GuestController@edit');
Route::post('/guest/update/{id}', 'GuestController@update');
Route::delete('/guest/delete/{id}', 'GuestController@delete');
Route::get('/guests', 'GuestController@index');
