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
    Route::get('video', 'TutorialController@uploadIndex')->name('tutorial.video');
    Route::post('complete', 'TutorialController@uploadCreate')->name('tutorial.upload');
    Route::post('save', 'TutorialController@uploadSubmit')->name('tutorial.save');
});

Route::post('/search/video', 'TutorialController@search')->name('tutorial.search');
Route::get('/search/video/{game}', 'TutorialController@searchByFilter')->name('tutorial.search.game');

Route::get('/tutorial/{videoid}', 'TutorialController@show')->name('tutorial.upload');

Route::post('/channel/subscribe', 'HandleUserActionController@subscribeUserToChannel')->name('user.subscribe');
Route::post('/channel/unsubscribe', 'HandleUserActionController@unsubscribeUserFromChannel')->name('user.unsubscribe');

Route::post('/user/rating', 'HandleUserActionController@tutorialRating')->name('tutorial.rating');

Route::get('/community', 'CommunitySugestionsController@index')->name('community.show');
Route::post('/community', 'CommunitySugestionsController@store')->name('community.store');
Route::get('/community/{category}', 'CommunitySugestionsController@index');