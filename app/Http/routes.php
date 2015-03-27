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

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'PagesController@index');


Route::get('home', 'PagesController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);




$router->bind('projects', function($slug){
	/**
	*
	* retrieve the first slug matching the query in the db
	*/
	
	return \App\models\Project::whereSlug($slug)->first();

});

Route::get('search/{word}', 'PagesController@search');


Route::resource('projects', 'PagesController');

Route::resource('comments', 'CommentController');


