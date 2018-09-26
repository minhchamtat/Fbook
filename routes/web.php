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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::resource('books', 'BookController');
    Route::resource('books/{slug}/review', 'ReviewBookController');
});

Route::prefix('admin')->group(function () {
    Route::get('/listbook', 'BookController@ajaxShow')->name('book.show');
    Route::resource('/book', 'BookController')->except(['show']);
    Route::resource('/category', 'CategoryController')->except(['show']);
    Route::get('/post', 'HomeController@index');
    Route::get('/reputation', 'HomeController@index');
    Route::get('/tag', 'HomeController@index');
    Route::get('/', function() {
        return view('admin.layout.index');
    }); // create later
    Route::resource('/roles', 'RoleController');
    Route::resource('/offices', 'OfficeController');
    Route::resource('/users', 'UserController');
});

Route::get('/home', 'HomeController@index')->name('home');
