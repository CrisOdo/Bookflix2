<?php

use Illuminate\Support\Facades\Route;
use App\Book;

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
    $libros = Book::inRandomOrder()->limit(6)->get();
    return view('welcome', compact('libros'));
});

Auth::routes();



Route::get('/reporteMenosLeido', 'ReportesController@reporteMenosLeido');
Route::get('/generarReporteMenosLeido', 'ReportesController@generarReporteMenosLeido');
Route::get('/reporteSuscripciones', 'ReportesController@reporteSuscripciones');
Route::get('/generarReporteSuscipciones', 'ReportesController@generarReporteSuscipciones');

Route::get('/favoritos/index', 'FavoritosController@index');
Route::get('/marcarFavorito/{book}', 'FavoritosController@marcarFavorito');
Route::get('/desmarcarFavorito/{book}', 'FavoritosController@desmarcarFavorito');

Route::patch('/ASA/{user}', 'ProfileController@activarSpoilerAlert');
Route::patch('/DSA/{user}', 'ProfileController@desactivarSpoilerAlert');

Route::post('/comment/{user}', 'ComentarioController@store');
Route::delete('/comment/delete/{book}', 'ComentarioController@delete');

Route::get('/pasatePremium', 'PerfilController@confirmPremium');
Route::patch('/pasatePremium/{user}', 'PerfilController@premium');
Route::get('/pasateBase', 'PerfilController@confirmBase');
Route::patch('/pasateBase/{user}', 'PerfilController@base');

Route::get('/perfiles/index', 'PerfilController@index');
Route::get('/perfiles/desactivar', 'PerfilController@confirmDesactivar');
Route::delete('/perfiles/delete/{perfil}', 'PerfilController@desactivar');
Route::get('/perfiles/deleted', 'PerfilController@deleted');

Route::get('/perfil/create', 'PerfilController@create');
Route::post('/perfil/new', 'PerfilController@newPerfil');
Route::get('/chooseProfile', 'PerfilController@choose');
Route::patch('/cp', 'PerfilController@marcarPerfilElegido');


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


Route::patch('/book/leido/{book}', 'UserBooksController@leido');
Route::get('/book/search', 'UserBooksController@search');
Route::get('/book/index', 'BooksController@index');
Route::get('/book/type', 'BooksController@type');
Route::get('/t', 'BooksController@selectedType');
Route::get('/book/lista', 'UserBooksController@index');
Route::get('/book/detalle/{book}', 'UserBooksController@show');
Route::get('/book/success', 'BooksController@success');
Route::get('/book/create', 'BooksController@create');
Route::get('/book/editE/{book}', 'BooksController@editE');
Route::get('/book/editC/{book}', 'BooksController@editC');
Route::patch('/book/updateE/{book}', 'BooksController@updateE');
Route::patch('/book/updateC/{book}', 'BooksController@updateC');
Route::get('/book/modified', 'BooksController@modified');
Route::get('/book/read/{book}', 'UserBooksController@view');
Route::get('/book/readAdelanto/{book}', 'UserBooksController@viewAdelanto');
Route::get('/book/deleteAdelanto/{book}', 'BooksController@deleteAdelanto');


Route::get('/book/deleteConfirm/{book}', 'BooksController@confirm');
Route::delete('/book/delete/{book}', 'BooksController@delete');
Route::get('/book/deleted', 'BooksController@deleted');


Route::post('/be', 'BooksController@storeE');
Route::post('/bc', 'BooksController@storeC');

Route::get('/chapter/success', 'ChapterController@success');
Route::get('/chapter/create', 'ChapterController@create');
Route::get('/chapter/read/{chapter}', 'UserChaptersController@view');
Route::get('/chapter/delete/{chapter}', 'ChapterController@confirm');
Route::delete('/chapter/delete/{chapter}', 'ChapterController@delete');
Route::get('/chapter/deleted', 'ChapterController@deleted');
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


