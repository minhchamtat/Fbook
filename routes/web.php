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

Route::group(['namespace' => 'User'], function () {
    Route::resource('books', 'BookController');
    Route::get('books/category/{slug}', 'BookController@getBookCategory')->name('book.category');
    Route::get('books/office/{slug}', 'BookController@getBookOffice')->name('book.office');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('books/{slug}/review', 'ReviewBookController');
        Route::resource('review/{id}/vote', 'VoteController');
        Route::post('/books/sharing/{id}', 'UserController@sharingBook');
        Route::post('/books/remove-owner/{id}', 'UserController@removeOwner');
        Route::post('/books/borrowing/{id}', 'UserController@borrowingBook');
        Route::post('/books/cancelBorrowing/{id}', 'UserController@cancelBorrowing');
        Route::get('/my-profile', 'UserController@myProfile')->name('my-profile');
        Route::post('/my-profile/{request}', 'UserController@getProfileData');
    });
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
