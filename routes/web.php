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
    return view('welcome');
});

Route::get('/test1', function() {
    return 'Hello World';
});

Route::get('/test2', function() {
    return view('test', ['message' => 'Hello Laravel']);
});

Route::get('/admin', 'DashboardController@index');

Route::get('/admin/category', 'CategoryController@index');
Route::get('/admin/category/create', 'CategoryController@create')->name('category.create');
Route::post('/admin/category', 'CategoryController@store');
Route::delete('/admin/category/{id}', 'CategoryController@destroy'); // delete
Route::get('/admin/category/{id}', 'CategoryController@show'); // show
Route::get('/admin/category/{id}/edit', 'CategoryController@edit'); // form edit
Route::put('/admin/category/{id}', 'CategoryController@update');