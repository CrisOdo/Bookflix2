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


Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/author/show', 'AuthorsController@index');
Route::get('/author/success', 'AuthorsController@success');
Route::get('/author/create', 'AuthorsController@create');
Route::post('/a', 'AuthorsController@store');

Route::get('/genre/show', 'GenresController@index');
Route::get('/genre/success', 'GenresController@success');
Route::get('/genre/create', 'GenresController@create');
Route::post('/g', 'GenresController@store');

Route::get('/editorial/show', 'EditorialsController@index');
Route::get('/editorial/succes', 'EditorialsController@success');
Route::get('/editorial/create', 'EditorialsController@create');
Route::post('/e', 'EditorialsController@store');

Route::get('/book/show', 'BooksController@index');
Route::get('/book/success', 'BooksController@success');
Route::get('/book/create', 'BooksController@create');
Route::post('/b', 'BooksController@store');

Route::get('/home', 'HomeController@index');
Route::get('/profile/show', 'ProfileController@index');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/update', 'ProfileController@update')->name('profile.update');
