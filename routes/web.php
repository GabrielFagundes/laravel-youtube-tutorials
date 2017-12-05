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
Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::get('/completeprofile', 'ProfileController@complete')->name('profile.complete');
Route::post('/completeprofile', 'ProfileController@update')->name('profile.update');

Route::get('/tutorial/upload', 'TutorialController@show')->name('tutorial.show');



