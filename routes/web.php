<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// standard routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});

// Google auth routes
Route::get('auth/google', 'Auth\GoogleController@redirectToProvider')->name('google.auth');
Route::get('auth/google/callback', 'Auth\GoogleController@handleProviderCallback');

// authentication routes
Auth::routes();

// profile routes
Route::get('/profile/{username}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/complete', 'ProfileController@complete')->name('profile.complete');
Route::get('/profile/update', 'ProfileController@create')->name('profile.update');
