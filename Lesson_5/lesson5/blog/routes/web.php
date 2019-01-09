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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ok', function () {
    return 'abc ' . storage_path();
});

Route::get('/ok/index', 'FirstController@index');

Route::get('/ok/index/html', 'FirstController@view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/books', 'BooksController@index');
Route::get('/books/getBooks', 'BooksController@getBooks');
Route::get('/books/{id}', 'BooksController@getBook');
Route::post('/book/{id}', 'BooksController@deleteBook');
