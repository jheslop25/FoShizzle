<?php

use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// profile controller routes

Route::post('/user', 'profileController@getUser');

Route::post('/user/update', 'profileController@update');

Route::post('/user/destroy', 'profileController@destroy');

// like controller

Route::post('/like/tweet', 'likeController@likeTweet');

Route::post('/unlike/tweet', 'likeController@unlikeTweet');

Route::post('/like/comment', 'likeController@likeComment');

Route::post('/unlike/comment', 'likeController@unlikeComment');

// follow controller

Route::post('/follow', 'followController@follow');

Route::post('/unfollow', 'followController@unfollow');

Route::post('/list', 'followController@list');

// comment controller

Route::post('/comment/create', 'commentController@create');

Route::post('/comment/update', 'commentController@update');

Route::post('/comment/delete', 'commentController@delete');

Route::post('/comment/get', 'commentController@get');

Route::post('/comment/get/all', 'commentController@getAll');


// tweet controller

Route::post('/create', 'tweetController@create');

Route::post('/update', 'tweetController@update');

Route::post('/delete', 'tweetController@delete');

Route::post('/get', 'tweetController@get');

Route::post('/get/all', 'tweetController@getAll');
