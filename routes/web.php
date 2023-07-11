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

Route::get('/books', 'App\Http\Controllers\newBookController@index')->name('books.index');
Route::get('/books/show/{id}','App\Http\Controllers\newBookController@show')->name('books.show');
Route::get('/books/create', 'App\Http\Controllers\newBookController@create')->name('books.create');
Route::post('/books/store', 'App\Http\Controllers\newBookController@store')->name('books.store');
Route::get('/books/edit/{id}','App\Http\Controllers\newBookController@edit')->name('books.edit');
Route::post('/books/update/{id}','App\Http\Controllers\newBookController@update')->name('books.update');
Route::get('/books/delete/{id}','App\Http\Controllers\newBookController@delete')->name('books.delete');
