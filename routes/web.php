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
Route::get('/', 'HomeController@index');
Route::post('/home', 'HomeController@loadDataAjax');
Route::post('/', 'HomeController@loadDataAjax');

// Google auth routes
Route::get('auth/google', 'Auth\GoogleController@redirectToProvider')->name('google.auth');
Route::get('auth/google/callback', 'Auth\GoogleController@handleProviderCallback');

// authentication routes
Auth::routes();

// profile routes
Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::get('/completeprofile', 'ProfileController@complete')->name('profile.complete');
Route::post('/completeprofile', 'ProfileController@update')->name('profile.update');

// upload routes

Route::group(['prefix' => 'tutorial/upload',  'middleware' => 'auth'], function()
{
    Route::get('index', 'TutorialController@uploadIndex')->name('tutorial.show');
    Route::post('complete', 'TutorialController@uploadCreate')->name('tutorial.upload');
    Route::post('save', 'TutorialController@uploadSubmit')->name('tutorial.save');
});

Route::get('/tutorial/{videoid}', 'TutorialController@show')->name('tutorial.upload');

Route::post('/subscribe/channel', 'HandleUserActionController@subscribeUserToChannel')->name('user.subscribe');
Route::post('/unsubscribe/channel', 'HandleUserActionController@unsubscribeUserFromChannel')->name('user.unsubscribe');