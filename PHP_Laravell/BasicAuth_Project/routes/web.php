<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
  //$visited = DB::table('user_models')->where('name', 'ccwe')->pluck('name');
  return view('home');
  //return $visited;
})->name('home');

Route::get('/authorization', function() {
	return view('authorization');
})->name('auth-form');

Route::get('/registration', function() {
        return view('registration');
})->name('reg-form');

Route::get('/authorized', function() {
        return view('authorized');
})->name('authorized');

Route::post('/registration/submit', 'UsersController@submit')->name('reg-check');
Route::post('/authorization/submit', 'AuthController@submit')->name('auth-check');
