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
Route::get('/books/show/{id}', 'App\Http\Controllers\newBookController@show')->name('books.show');

//categories
Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/categories/show/{id}', 'App\Http\Controllers\categoryController@show')->name('categories.show');


Route::middleware('isLogin')->group(function () {
//create book
Route::get('/books/create', 'App\Http\Controllers\newBookController@create')->name('books.create');
Route::post('/books/store', 'App\Http\Controllers\newBookController@store')->name('books.store');

//update book
Route::get('/books/edit/{id}', 'App\Http\Controllers\newBookController@edit')->name('books.edit');
Route::post('/books/update/{id}', 'App\Http\Controllers\newBookController@update')->name('books.update');

//create category
Route::get('/categories/create', 'App\Http\Controllers\categoryController@create')->name('categories.create');
Route::post('/categories/store', 'App\Http\Controllers\categoryController@store')->name('categories.store');

//update category
Route::get('/categories/edit/{id}', 'App\Http\Controllers\categoryController@edit')->name('categories.edit');
Route::post('/categories/update/{id}', 'App\Http\Controllers\categoryController@update')->name('categories.update');

Route::get('/books/comment/{id}','App\Http\Controllers\CommentController@create')->name('comments.create');
Route::post('/books/createComment/{id}','App\Http\Controllers\CommentController@storeComment')->name('comments.store');

//logout
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

});

Route::middleware('is_guest')->group(function(){

// Authentication
//Register
Route::get('/register', 'App\Http\Controllers\AuthController@register')->name('auth.register');
Route::post('/register', 'App\Http\Controllers\AuthController@handleRegister')->name('auth.handleRegister');
//login
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::post('/login', 'App\Http\Controllers\AuthController@handleLogin')->name('auth.handleLogin');


});

Route::middleware('isLoginAdmin')->group(function(){

//delete category
Route::get('/categories/delete/{id}', 'App\Http\Controllers\categoryController@delete')->name('categories.delete');

//delete book
Route::get('/books/delete/{id}', 'App\Http\Controllers\newBookController@delete')->name('books.delete');

});
