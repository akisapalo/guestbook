<?php

Route::get('/{any}', function () {
  return view('guest');
})->where('any', '.*');
Route::resource('guests', 'GuestController');