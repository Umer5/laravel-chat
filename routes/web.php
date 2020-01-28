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


//Route::get('/chat', 'HomeController@show');
Route::get('/', 'HomeController@show');

//Route::get('/load-latest-messages', 'MessagesController@getLoadLatestMessages');
Route::get('/load-latest-messages', 'MessagesController@getLoadLatestMessages');

Route::post('/send', 'MessagesController@postSendMessage');

Route::get('/fetch-old-messages', 'MessagesController@getOldMessages');

Auth::routes();