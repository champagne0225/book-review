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

Route::get('/', 'BookRegisterController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::resource('books', 'BooksController');

Route::get('search','SearchController@index')->name('search');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('register', 'BookRegisterController@store')->name('book.register');
        Route::delete('unregister', 'BookRegisterController@destroy')->name('book.unregister');
        Route::post('update', 'BookRegisterController@update')->name('status.update');
        Route::get('registering', 'BooksController@registering')->name('books.registering');
    });
    
    Route::resource('books', 'BooksController', ['only' => ['store', 'destroy']]);
});
