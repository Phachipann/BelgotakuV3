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

Route::get('/', ['as'=>'index', 'uses'=>'WebSiteController@index']);

//Route inscription
Route::get('register', ['as'=>'register', 'uses'=>'WebSiteController@register']);
Route::post('register', ['as'=>'create', 'uses'=>'WebSiteController@create']);

//Route connexion
Route::get('login', ['as'=>'getLogin', 'uses'=>'WebSiteController@getLogin']);
Route::post('login', ['as'=>'postLogin', 'uses'=>'WebSiteController@postLogin']);

Route::get('logout', ['as'=>'logout', 'uses'=>'WebSiteController@logout']);

Route::get('about', ['as'=>'about', 'uses'=>'WebSiteController@about']);
Route::get('contact', ['as'=>'contact', 'uses'=>'WebSiteController@contact']);
Route::get('profil', ['as'=>'profil', 'uses'=>'WebSiteController@profil']);
Route::get('articles', ['as'=>'articles', 'uses'=>'WebSiteController@articles']);
Route::get('events', ['as'=>'events', 'uses'=>'WebSiteController@events']);

//Route forum page
Route::group(['prefix'=>'forum', 'as'=>'forum.'], function(){
	Route::get('', ['as'=>'index', 'uses'=>'ForumController@index']);

	//Route section page
	Route::group(['prefix'=>'section', 'as'=>'section.'], function(){
		Route::get('{section}', ['as'=>'show', 'uses'=>'ForumController@showSection']);
		Route::get('{section}/create', ['as'=>'create.get', 'uses'=>'ForumController@createTopicGet']);
		Route::post('{section}/create', ['as'=>'create.post', 'uses'=>'ForumController@createTopicPost']);
	});

	//Route topic page
	Route::group(['prefix'=>'topic', 'as'=>'topic.'], function(){
		Route::get('{topic}', ['as'=>'show', 'uses'=>'ForumController@showTopic']);	
		Route::post('{topic}', ['as'=>'reply', 'uses'=>'ForumController@reply']);
	});
});