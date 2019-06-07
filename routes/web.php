<?php


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//话题
Route::get('/threads','ThreadController@index');
Route::get('/threads/{thread}','ThreadController@show');


//回复
Route::post('/threads/{thread}/replies','ReplyController@store');
