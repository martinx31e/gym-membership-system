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

Route::get('/', 'MembersController@index')->
middleware('auth');


Route::get('/members', 'PagesController@members')->
middleware('auth');


Route::resource('members', 'MembersController')->
middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reports', 'MembersController@reports')->name('reports');
