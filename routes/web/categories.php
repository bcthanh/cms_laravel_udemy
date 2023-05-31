<?php
Route::get('/cats', 'CategoryController@index')->name('cat.index');
Route::get('/cats/create', 'CategoryController@create')->name('cat.create');
Route::post('/cats', 'CategoryController@store')->name('cat.store');
Route::delete('/cats/{cat}/destroy', 'CategoryController@destroy')->name('cat.destroy');
Route::get('/cats/{cat}/edit', 'CategoryController@edit')->name('cat.edit');
Route::put('/cats/{cat}/update', 'CategoryController@update')->name('cat.update');