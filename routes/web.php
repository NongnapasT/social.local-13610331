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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
    Route::get('/','newFeedController@index');
    Route::get('/profile/{id}','profileController@index');
    Route::post('/post','postController@store');
    Route::post('/post/like/{id}','PostlikeController@store');
    Route::post('/post/comment/{id}','PostcommentController@store');
    Route::post('/follow/{id}','FollowController@store');
    Route::post('/profile','ProfileController@store');
});


