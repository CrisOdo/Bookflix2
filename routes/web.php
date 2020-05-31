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

Route::get('/author/index', 'AuthorsController@index');
Route::get('/author/success', 'AuthorsController@success');
Route::get('/author/create', 'AuthorsController@create');
Route::post('/a', 'AuthorsController@store');

Route::get('/genre/index', 'GenresController@index');
Route::get('/genre/success', 'GenresController@success');
Route::get('/genre/create', 'GenresController@create');
Route::post('/g', 'GenresController@store');

Route::get('/editorial/index', 'EditorialsController@index');
Route::get('/editorial/success', 'EditorialsController@success');
Route::get('/editorial/create', 'EditorialsController@create');
Route::post('/e', 'EditorialsController@store');

Route::get('/book/index', 'BooksController@index');
Route::get('/book/lista', 'UserBooksController@index');
Route::get('/book/detalle/{book}', 'UserBooksController@show');
Route::get('/book/success', 'BooksController@success');
Route::get('/book/create', 'BooksController@create');
Route::get('/book/edit/{book}', 'BooksController@edit')->name('book.edit');
Route::patch('/book/update/{book}', 'BooksController@update')->name('book.update');
Route::get('/book/modified', 'BooksController@modified');
Route::get('/book/read/{book}', 'UserBooksController@view');



Route::post('/b', 'BooksController@store');

Route::get('/chapter/success', 'ChapterController@success');
Route::get('/chapter/create', 'ChapterController@create');
Route::get('/chapter/read/{chapter}', 'UserChaptersController@view');
Route::post('/c', 'ChapterController@store');



Route::get('/historial/index', 'HistorialesController@index');

Route::get('/novedad/index', 'NovedadesController@index');
Route::get('/novedad/lista', 'UserNovedadController@index');
Route::get('/novedad/detalle/{novedad}', 'UserNovedadController@show');
Route::get('/novedad/success', 'NovedadesController@success');
Route::get('/novedad/create', 'NovedadesController@create');
Route::get('/novedad/edit/{novedad}', 'NovedadesController@edit')->name('novedad.edit');
Route::get('/novedad/show/{novedad}', 'NovedadesController@show');
Route::get('/novedad/deleteConfirm/{novedad}', 'NovedadesController@confirm');
Route::delete('/novedad/delete/{novedad}', 'NovedadesController@delete');
Route::get('/novedad/deleted', 'NovedadesController@deleted');
Route::patch('/novedad/update/{novedad}', 'NovedadesController@update')->name('novedad.update');
Route::get('/novedad/modified', 'NovedadesController@modified');
Route::get('/novedad/lista', 'UserNovedadController@index');


Route::post('/n', 'NovedadesController@store');

Route::get('/home', 'HomeController@index');
Route::get('/profile/show', 'ProfileController@index');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/update', 'ProfileController@update')->name('profile.update');
