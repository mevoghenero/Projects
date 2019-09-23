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

Route::get('/','WelcomeController@index')->name('post.index');
Route::post('/post','WelcomeController@post')->name('post.name');
Route::get('/edit/{id}', 'WelcomeController@update')->name('post.edit');
Route::put('/update/{id}', 'WelcomeController@put')->name('post.put');
Route::delete('/delete/{id}', 'WelcomeController@delete')->name('post.delete');
