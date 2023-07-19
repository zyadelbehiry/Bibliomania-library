<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Books
Route::get('/books', 'App\Http\Controllers\newBookController@index')->name('books.index');
Route::get('/books/show/{id}','App\Http\Controllers\newBookController@show')->name('books.show');
//insert
Route::get('/books/create', 'App\Http\Controllers\newBookController@create')->name('books.create');
Route::post('/books/store', 'App\Http\Controllers\newBookController@store')->name('books.store');
//update
Route::get('/books/edit/{id}','App\Http\Controllers\newBookController@edit')->name('books.edit');
Route::post('/books/update/{id}','App\Http\Controllers\newBookController@update')->name('books.update');
//delete
Route::get('/books/delete/{id}','App\Http\Controllers\newBookController@delete')->name('books.delete');


//categories
Route::get('/categories','App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/categories/show/{id}','App\Http\Controllers\categoryController@show')->name('categories.show');
//insert
Route::get('/categories/create', 'App\Http\Controllers\categoryController@create')->name('categories.create');
Route::post('/categories/store', 'App\Http\Controllers\categoryController@store')->name('categories.store');
//update
Route::get('/categories/edit/{id}','App\Http\Controllers\categoryController@edit')->name('categories.edit');
Route::post('/categories/update/{id}','App\Http\Controllers\categoryController@update')->name('categories.update');
//delete
Route::get('/categories/delete/{id}','App\Http\Controllers\categoryController@delete')->name('categories.delete');
// Authentication
Route::get('/register','App\Http\Controllers\AuthController@register')->name('auth.register');
Route::post('/register','App\Http\Controllers\AuthController@handleRegister')->name('auth.handleRegister');

