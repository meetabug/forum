<?php


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/threads','ThreadController@index');
Route::get('/threads/{thread}','ThreadController@show');