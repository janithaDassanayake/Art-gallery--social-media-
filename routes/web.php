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




Auth::routes();

Route::post('follow/{user}','FollowsController@store');


Route::get('/','Postscontroller@index'); 
//uda yata paru kala. hetuwa /p/{post} kiyana eken okkoma dewal gannwa
Route::get('/p/create','Postscontroller@create');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/p/{post}','Postscontroller@show');

// Route::get('/p/create','Postscontroller@create');


Route::post('/p','Postscontroller@store');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
