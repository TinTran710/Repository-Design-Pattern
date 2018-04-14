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

Route::get('/', function () {
    return view('welcome');
});

Route::get('create', 'KeywordController@getCreate');
Route::post('create', 'KeywordController@postCreate');

Route::get('search', 'KeywordController@getSearch');
Route::post('search', 'KeywordController@postSearch');

Route::get('improve/{id}', 'KeywordController@getImprove');
Route::post('improve/{id}', 'KeywordController@postImprove');

Route::get('list', 'KeywordController@getList');
Route::post('list', 'KeywordController@postList');

Route::get('index', 'KeywordController@index');

Route::get('test', 'KeywordController@test');