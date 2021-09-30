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

Route::get('/', 'StaticPageController@home');

Route::prefix('books')->name('books.')->group(function () {
    Route::get('', 'BookController@index')
        ->name('index');

    Route::get('/create', 'BookController@create')
        ->name('create');

    Route::get('/{id}', 'BookController@show')
        ->name('show');

    Route::post('', 'BookController@store')
        ->name('store');

    Route::put('/{id}', 'BookController@update')
        ->name('update');

    Route::delete('/{id}', 'BookController@destroy')
        ->name('destroy');

    Route::get('/{id}/edit', 'BookController@edit')
        ->name('edit');
});

Route::prefix('authors')->name('authors.')->group(function () {
    Route::get('', 'AuthorController@index')
        ->name('index');

    Route::get('/{id}', 'AuthorController@show')
        ->name('show');
});

Route::prefix('genres')->name('genres.')->group(function () {
    Route::get('/{id}', 'GenreController@show')
        ->name('show');
});
