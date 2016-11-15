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
