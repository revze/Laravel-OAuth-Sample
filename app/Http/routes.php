<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['prefix'=>'login'],function(){
  Route::get('facebook','Auth\AuthController@redirectToFacebook');
  Route::get('facebook/callback','Auth\AuthController@handleFacebookCallback');
  Route::get('twitter','Auth\AuthController@redirectToTwitter');
  Route::get('twitter/callback','Auth\AuthController@handleTwitterCallback');
  Route::get('google','Auth\AuthController@redirectToGoogle');
  Route::get('google/callback','Auth\AuthController@handleGoogleCallback');
  Route::get('instagram','Auth\AuthController@redirectToInstagram');
  Route::get('instagram/callback','Auth\AuthController@handleInstagramCallback');
  Route::get('linkedin','Auth\AuthController@redirectToLinkedIn');
  Route::get('linkedin/callback','Auth\AuthController@handleLinkedInCallback');
  Route::get('github','Auth\AuthController@redirectToGithub');
  Route::get('github/callback','Auth\AuthController@handleGithubCallback');
});

Route::get('/home', 'HomeController@index');
