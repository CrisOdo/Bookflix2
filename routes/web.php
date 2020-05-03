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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/author', 'AuthorsController@index');
Route::get('/author/create', 'AuthorsController@create');
Route::post('/a', 'AuthorsController@store');

Route::get('/genre', 'GenresController@index');
Route::get('/genre/create', 'GenresController@create');
Route::post('/g', 'GenresController@store');

Route::get('/editorial', 'EditorialsController@index');
Route::get('/editorial/create', 'EditorialsController@create');
Route::post('/e', 'EditorialsController@store');

Route::get('/book', 'BooksController@index');
Route::get('/book/success', 'BooksController@success');
Route::get('/book/create', 'BooksController@create');
Route::post('/b', 'BooksController@store');
