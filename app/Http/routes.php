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

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Admin'], function()
{

	Route::resource('users', 'UserController');
	Route::resource('clients', 'ClientController');
	Route::get('users-profile', 'UserController@showProfile');
	Route::post('users-profile', 'UserController@updateProfile');
	Route::resource('resources', 'ResourceController');
		
});



Route::resource('contact', 'MailController');
Route::post('/contact/send', 'MailController@send');


Route::resource('services', 'ServiceController');

Route::get('/services/get', 'ServiceController@getService');


/*Route::post('/send', ['as' => 'send', 'uses' => 'MailController@send']);

Route::get('/contact', ['as' => 'contact', 'uses' => 'MailController@index'];*/


