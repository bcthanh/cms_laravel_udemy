<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');


Route::middleware('auth')->group(function(){

    Route::get('/admin', 'AdminsController@index')->name('admin.index');
    Route::post('/post/{post}/comment', 'CommentController@store')->name('comment.store');
    Route::post('/comment/reply', 'CommentReplyController@store')->name('comment.reply.store');
});