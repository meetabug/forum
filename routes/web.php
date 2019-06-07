<?php


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//话题

Route::resource('threads','ThreadController');

//回复
Route::post('/threads/{thread}/replies','ReplyController@store');
