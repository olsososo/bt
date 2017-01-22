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

Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);

Route::get('/test', ['as'=>'test', 'uses'=>'IndexController@test']);

Route::get('/search/{keyword}', ['as'=>'search', 'uses'=>'IndexController@search']);

Route::get('/torrent/{id}', ['as'=>'show', 'uses'=>'IndexController@show']);

Route::get('/locale/{locale}', ['as'=>'locale', 'uses'=>'IndexController@locale']);

Route::get('/hot', ['as'=>'hot', 'uses'=>'IndexController@hot']);

Route::get('/about/disclaimer', ['as'=>'disclaimer', 'uses'=>'AboutController@disclaimer']);

Route::get('/about/tutorial', ['as'=>'tutorial', 'uses'=>'AboutController@tutorial']);

Route::post('/torrents', ['as'=>'torrents', 'uses'=>'IndexController@torrents']);

//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
