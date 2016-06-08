<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

	Route::get('/', 'PostController@index');

	Route::resource('/bap', 'BapController');

	Route::resource('/user', 'UserController');

	Route::resource('/post', 'PostController');

	Route::get('/admin', function() {
		return 'admin';
	})->middleware('isadmin');

	Route::resource('/comment', 'CommentController');

Route::get('/message/create/{id}', ['as' => 'message.creates', 'uses' => 'MessageController@create']);

	Route::resource('/message', 'MessageController');

	Route::get('/tag/{tag}', [
		'as' => 'post.tag',
		'uses' => "PostController@tag"
		]);

	Route::get('/prix/{prix}', [
		'as' => 'post.prix',
		'uses' => "PostController@prix"
		]);


});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
