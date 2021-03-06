<?php

Route::get('/', 'ThreadController@index');

Auth::routes();


//话题搜索
Route::get('threads/search', 'SearchController@show');

//话题
Route::get('threads', 'ThreadController@index')->name('threads');
Route::get('threads/create', 'ThreadController@create');
Route::get('threads/{channel}/{thread}', 'ThreadController@show');
Route::patch('threads/{channel}/{thread}', 'ThreadController@update');
Route::post('threads', 'ThreadController@store');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy');
Route::get('threads/{channel}', 'ThreadController@index');


//话题锁定
Route::post('locked-threads/{thread}', 'LockedThreadController@store')->name('locked-threads.store');
Route::delete('locked-threads/{thread}', 'LockedThreadController@destroy')->name('locked-threads.destroy');

//回复
Route::post('threads/{channel}/{thread}/replies', 'ReplyController@store');
Route::get('threads/{channel}/{thread}/replies', 'ReplyController@index');
Route::patch('replies/{reply}', 'ReplyController@update');
Route::delete('replies/{reply}', 'ReplyController@destroy')->name('replies.destroy');
//最佳回复
Route::post('replies/{reply}/best', 'BestReplyController@store')->name('best-replies.store');

//点赞
Route::post('replies/{reply}/favorites', 'FavoriteController@store');
Route::delete('replies/{reply}/favorites', 'FavoriteController@destroy');

//个人中心
Route::get('profiles/{user}', 'ProfileController@show')->name('profile');

//订阅
Route::post('threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionController@store');
Route::delete('threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionController@destroy');
Route::get('profiles/{user}/notifications', 'UserNotificationController@index');
Route::delete('profiles/{user}/notifications/{notification}', 'UserNotificationController@destroy');

//邮箱验证
Route::get('register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

//@用户名搜索
Route::get('api/users', 'Api\UserController@index');

//用户头像上传
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->name('avatar');