<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/index','HomeController@index');
Route::get('/home/admin','HomeController@adminIndex');
Route::get('/home/notdone','HomeController@notdone');

Route::get('/country/editing','CountryController@index');
Route::get('/country/inserting','CountryController@create');
Route::post('/country/insert','CountryController@store');
Route::get('/country/reading/{id}','CountryController@show');
Route::get('/country/updating/{id}','CountryController@edit');
Route::post('/country/update/{id}','CountryController@update');
Route::post('/country/delete/{id}','CountryController@destroy');

Route::get('/customer/editing','CustomerController@index');
Route::get('/customer/inserting','CustomerController@create');
Route::post('/customer/insert','CustomerController@store');
Route::get('/customer/reading/{id}','CustomerController@show');
Route::get('/customer/updating/{id}','CustomerController@edit');
Route::post('/customer/update/{id}','CustomerController@update');
Route::post('/customer/delete/{id}','CustomerController@destroy');

Route::get('/product/editing','ProductController@index');
Route::get('/product/inserting','ProductController@create');
Route::post('/product/insert','ProductController@store');
Route::get('/product/reading/{id}','ProductController@show');
Route::get('/product/updating/{id}','ProductController@edit');
Route::post('/product/update/{id}','ProductController@update');
Route::post('/product/delete/{id}','ProductController@destroy');

Route::get('/category/editing','CategoryController@index');
Route::get('/category/inserting','CategoryController@create');
Route::post('/category/insert','CategoryController@store');
Route::get('/category/reading/{id}','CategoryController@show');
Route::get('/category/updating/{id}','CategoryController@edit');
Route::post('/category/update/{id}','CategoryController@update');
Route::post('/category/delete/{id}','CategoryController@destroy');