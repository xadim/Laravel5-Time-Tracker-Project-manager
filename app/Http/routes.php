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

Route::get('/', 'PhasesController@index');


Route::get('home', 'PhasesController@index');

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

$router->bind('clients', function($id){ return \App\models\Client::whereId($id)->first();});

$router->bind('types', function($id){ return \App\models\Type::whereId($id)->first();});

$router->bind('phases', function($id){ return \App\models\Phase::whereId($id)->first();});

Route::get('search/{word}', 'PagesController@search');

Route::resource('clients', 'ClientsController');

Route::resource('types', 'TypesController');

Route::resource('phases', 'PhasesController');

Route::get('phases/addTiming/{id}', 'PhasesController@timing');

Route::get('searchPhase/{word}', 'PhasesController@search');

Route::get('searchClientsPhases/{word}', 'PhasesController@searchcp');

Route::get('searchPerType/{word}', 'PhasesController@searchPerType');

Route::get('phases/updateTaskTitle/{id}', 'PhasesController@updateTaskTitle');

Route::resource('projects', 'PagesController');

Route::get('projects/updateProjectStatus/{arr}', 'PagesController@updateProjectStatus');

Route::get('projects/sortby/{status}', 'PagesController@sortby');

Route::resource('clientsProjects', 'PagesController@searchClientsProjects');

Route::get('projects/singleTask/{id}', 'PagesController@updateSingleTask');

Route::resource('comments', 'CommentController');

Route::get('usersCreate', 'UsersController@create');


$router->bind('users', function($id){ return \App\models\User::whereId($id)->first(); });


Route::resource('users', 'UsersController');









