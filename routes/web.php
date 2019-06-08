<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//话题
Route::get('threads', 'ThreadController@index');
Route::get('threads/create', 'ThreadController@create');
Route::get('threads/{channel}/{thread}', 'ThreadController@show');
Route::post('threads', 'ThreadController@store');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy');
Route::get('threads/{channel}', 'ThreadController@index');

//回复
Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');
Route::delete('/replies/{reply}', 'ReplyController@destroy');

//点赞
Route::post('/replies/{reply}/favorites', 'FavoriteController@store');

//个人中心
Route::get('/profiles/{user}', 'ProfileController@show')->name('profile');