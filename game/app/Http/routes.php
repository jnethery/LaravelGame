<?php

Route::get('/', ['as' => 'home', function() {
    return view('index');
}]);

// Auth functions
Route::group(['prefix' => 'auth', 'as' => 'auth::'], function() {
    Route::get('/', function() {
        return redirect()->route('home');
    });
    Route::get('register', 'Auth\AuthController@getRegister')->name('register');
    Route::post('register', 'Auth\AuthController@register');
    Route::get('login', 'Auth\AuthController@getLogin')->name('login');
    Route::post('login', 'Auth\AuthController@_login');
    Route::get('logout', function() {
        Auth::logout();
        return redirect()->route('home');
    });
});