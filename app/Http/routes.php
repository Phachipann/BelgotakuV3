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
Route::get('login', ['as'=>'login', 'uses'=>'WebSiteController@getLogin']);
Route::post('login', ['as'=>'login', 'uses'=>'WebSiteController@postLogin']);

Route::get('logout', ['as'=>'logout', 'uses'=>'WebSiteController@logout']);

Route::get('about', ['as'=>'about', 'uses'=>'WebSiteController@about']);
Route::get('contact', ['as'=>'contact', 'uses'=>'WebSiteController@contact']);

Route::resource('messages', 'PMController');
Route::get('getUsers', 'PMController@getUsers');

//Profil page
Route::group(['prefix'=>'profile', 'as'=>'profile.'], function(){
	Route::get('', ['as'=>'index', 'uses'=>'ProfileController@index']);
	Route::get('subjects', ['as'=>'subjects', 'uses'=>'ProfileController@getSubjects']);
	Route::get('messages', ['as'=>'messages', 'uses'=>'ProfileController@getMessages']);
	Route::get('badges', ['as'=>'badges', 'uses'=>'ProfileController@getBadges']);
});

Route::get('events', ['as'=>'events', 'uses'=>'WebSiteController@events']);

Route::resource('articles', 'ArticleController');
Route::post('articles/{articles}', ['as'=>'postcomments', 'uses'=>'ArticleController@postComment']);

//Route forum page
Route::group(['prefix'=>'forum', 'as'=>'forum.'], function(){
	Route::get('', ['as'=>'index', 'uses'=>'ForumController@index']);
	Route::get('create', ['as'=>'create.section', 'uses'=>'ForumController@createSectionGet']);
	Route::post('create', ['as'=>'create.section', 'uses'=>'ForumController@createSectionPost']);

	//Route section page
	Route::group(['prefix'=>'section', 'as'=>'section.'], function(){	
		Route::get('{section}', ['as'=>'show', 'uses'=>'ForumController@showSection']);
		Route::get('{section}/create', ['as'=>'create.topic', 'uses'=>'ForumController@createTopicGet']);
		Route::post('{section}/create', ['as'=>'create.topic', 'uses'=>'ForumController@createTopicPost']);
	});

	//Route topic page
	Route::group(['prefix'=>'topic', 'as'=>'topic.'], function(){
		Route::get('{topic}', ['as'=>'show', 'uses'=>'ForumController@showTopic']);	
		Route::post('{topic}', ['as'=>'post', 'uses'=>'ForumController@reply']);
		Route::get('{topic}/{reply}/edit', ['as'=>'edit.get', 'uses'=>'ForumController@getEdit']);
		Route::post('{topic}/{reply}/edit', ['as'=>'edit.post', 'uses'=>'ForumController@postEdit']);
		Route::get('{topic}/{reply}/destroy', ['as'=>'destroy', 'uses'=>'ForumController@destroy']);
	});
});