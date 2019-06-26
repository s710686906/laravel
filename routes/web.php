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
//基本
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
//注册
Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');
//登录
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('/users/{user}/bills', 'UsersController@bills')->name('users.bills');

Route::get('/users/{user}/mission', 'UsersController@mission')->name('users.mission');

Route::get('/users/{user}/photo', 'UsersController@photo')->name('users.photo');

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

Route::resource('bills', 'BillsController', ['only' => ['store', 'destroy']]);

Route::resource('mission', 'MissionController', ['only' => ['store', 'destroy']]);


Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');


