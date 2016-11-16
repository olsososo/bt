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

Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);

Route::get('/search/{keyword}', ['as'=>'search', 'uses'=>'IndexController@search']);

Route::get('/torrent/{id}', ['as'=>'show', 'uses'=>'IndexController@show']);

Route::get('/locale/{locale}', ['as'=>'locale', 'uses'=>'IndexController@locale']);

Route::get('/hot', ['as'=>'locale', 'uses'=>'IndexController@hot']);

Route::get('/about/statement', ['as'=>'locale', 'uses'=>'AboutController@statement']);

Route::get('/about/tutorial', ['as'=>'locale', 'uses'=>'AboutController@tutorial']);
