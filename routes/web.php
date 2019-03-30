<?php

Route::get('/{any}', function () {
  return view('post');
})->where('any', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('guests', 'GuestController');