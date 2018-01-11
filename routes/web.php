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
Route::get('/', 'HomeController@index')->name('home');

// Google auth routes
Route::get('auth/google', 'Auth\GoogleController@redirectToProvider')->name('google.auth');
Route::get('auth/google/callback', 'Auth\GoogleController@handleProviderCallback');

// authentication routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});
// profile routes
Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::get('/completeprofile', 'ProfileController@complete')->name('profile.complete');
Route::post('/completeprofile', 'ProfileController@update')->name('profile.update');

// tutorials routes
Route::get('/tutorial/upload', 'TutorialController@show')->name('tutorial.show');
Route::get('/tutorial/upload/{videoid}', 'TutorialController@upload')->name('tutorial.upload');
Route::post('/tutorial/upload/save', 'TutorialController@save')->name('tutorial.save');


