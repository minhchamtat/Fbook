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

Route::group(['middleware' => 'locale'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
    Route::post('/header-search', 'HomeController@searchAjax');
    Route::get('/search', 'HomeController@search')->name('search');

    Route::get('login/framgia', 'Auth\LoginController@redirectToProvider')->name('framgia.login');
    Route::get('login/framgia/callback', 'Auth\LoginController@handleProviderCallback');

    Route::group(['namespace' => 'User'], function () {
        Route::resource('books', 'BookController');
        Route::get('books/category/{slug}', 'BookController@getBookCategory')->name('book.category');
        Route::get('books/office/{slug}', 'BookController@getBookOffice')->name('book.office');
        Route::post('/book-detail', 'BookController@getDetailData');
        
        Route::group(['middleware' => 'auth'], function () {
            Route::resource('/books/{slug}/review', 'ReviewBookController');
            Route::resource('/review/{id}/vote', 'VoteController');
            Route::post('/books/sharing/{id}', 'UserController@sharingBook');
            Route::post('/books/remove-owner/{id}', 'UserController@removeOwner');
            Route::post('/books/borrowing/{id}', 'UserController@borrowingBook');
            Route::post('/books/cancelBorrowing/{id}', 'UserController@cancelBorrowing');
            Route::get('/my-profile', 'UserController@myProfile')->name('my-profile');
            Route::resource('my-request', 'MyRequestController');
            Route::post('/my-profile/{request}', 'UserController@getBooks');
            Route::get('/users/{id}', 'UserController@getUser')->name('user');
            Route::post('/follow/{id}', 'UserController@follow');
            Route::post('/unfollow/{id}', 'UserController@unfollow');
            Route::post('/notifications/{limit}', 'NotificationController@getLimitNotifications');
            Route::get('/notifications', 'NotificationController@getAllNotifications')->name('notifications');
            Route::post('/notification-update', 'Notification@updateNotification');
        });
    });


    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/listbook', 'BookController@ajaxShow')->name('book.show');
        Route::resource('/book', 'BookController')->except(['show']);
        Route::resource('/category', 'CategoryController')->except(['show']);
        Route::get('/post', 'HomeController@index');
        Route::get('/reputation', 'HomeController@index');
        Route::get('/tag', 'HomeController@index');
        Route::get('/', 'HomeController@adminIndex');
        Route::resource('/roles', 'RoleController');
        Route::resource('/offices', 'OfficeController');
        Route::resource('/users', 'UserController');
    });
});
