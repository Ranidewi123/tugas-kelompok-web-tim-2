<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product','ProductController@index');
Route::get('/product/create','ProductController@create');
Route::post('/product/create','ProductController@createSubmit');
Route::get('/product/edit/{id}','ProductController@edit');
Route::post('/product/edit/{id}','ProductController@editSubmit');
Route::get('/product/delete/{id}','ProductController@delete');

Route::get('/user','UserController@index');
Route::get('/user/create','UserController@create');
Route::post('/user/create','UserController@createSubmit');
Route::get('/user/edit/{id}','UserController@edit');
Route::post('/user/edit/{id}','UserController@editSubmit');
Route::get('/user/delete/{id}','UserController@delete');
