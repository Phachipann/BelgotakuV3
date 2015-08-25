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

Route::get('/', [
	'as'=>'index', 'uses'=>'WebSiteController@index']);

Route::get('register', [
	'as'=>'register', 'uses'=>'WebSiteController@register']);
Route::post('register', [
	'as'=>'create', 'uses'=>'WebSiteController@create']);

Route::get('login', [
	'as'=>'getLogin', 'uses'=>'WebSiteController@getLogin']);
Route::post('login', [
	'as'=>'postLogin', 'uses'=>'WebSiteController@postLogin']);

Route::get('logout', [
	'as'=>'logout', 'uses'=>'WebSiteController@logout']);

Route::get('about', [
	'as'=>'about', 'uses'=>'WebSiteController@about']);
Route::get('contact', [
	'as'=>'contact', 'uses'=>'WebSiteController@contact']);
Route::get('profil', [
	'as'=>'profil', 'uses'=>'WebSiteController@profil']);