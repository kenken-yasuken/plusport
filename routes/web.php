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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// PartnerDetal //
Route::get('partner/list', 'User\SearchController@showPartnerList');
Route::get('partner/detail', 'User\ShowDetailController@showDetail');

// REACTION FOR PARTNER //
Route::post('reaction/like', 'Matching\DoLikeController@doLike');

// SEND COMMENTS //
Route::get('chat/{id}', 'ChatController@showChatRoom' );
Route::post('chat/{id}', 'ChatController@addComment')->name('add');
Route::get('chat/result/ajax', 'ChatController@getData');




