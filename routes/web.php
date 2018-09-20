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

Route::get('/', 'HomeController@index');

Route::group(['namespace' => 'User'], function () {
    Route::resource('books', 'BookController');
});

Route::prefix('admin')->group(function () {
    Route::get('/listbook', 'BookController@ajaxShow')->name('book.show');
    Route::resource('/book', 'BookController')->except(['show']);
    Route::resource('/category', 'CategoryController')->except(['show']);
    Route::get('/post', 'HomeController@index');
    Route::get('/user', 'HomeController@index');
    Route::get('/reputation', 'HomeController@index');
    Route::get('/tag', 'HomeController@index');
    Route::get('/', 'HomeController@index');

    Route::resource('/roles', 'RoleController');
    Route::resource('/offices', 'OfficeController');
    Route::resource('/users', 'UserController');
});
