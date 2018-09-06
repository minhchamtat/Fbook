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

Route::get('/', function () {
    return view('index');
});

Route::get('/book-detail', function () {
    return view('book.book_detail');
});

Route::get('/add-a-book', function () {
    return view('book.add');
});

Route::get('/review', function () {
    return view('book.review');
});

Route::get('/books', function () {
    return view('book.books');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/notifications', function () {
    view('user.notifications');
});

Route::get('my-request', function () {
    return view('user.my_request');
});

Route::get('/posts', function () {
    return view('post.list');
});

Route::get('/post-detail', function () {
    return view('post.post_detail');
});

Route::get('/error', function () {
    return view('error');
});

Route::prefix('admin')->group(function () {
    Route::prefix('book')->group(function () {
        Route::get('/', function () {
            return view('admin.book.list');
        });
        Route::get('/edit', function () {
            return view('admin.book.edit');
        });
        Route::get('/add', function () {
            return view('admin.book.add');
        });
    });
    Route::prefix('category')->group(function () {
        Route::get('/', function () {
            return view('admin.category.list');
        });
        Route::get('/edit', function () {
            return view('admin.category.edit');
        });
        Route::get('/add', function () {
            return view('admin.category.add');
        });
    });
    Route::prefix('post')->group(function () {
        Route::get('/', function () {
            return view('admin.post.list');
        });
        Route::get('/edit', function () {
            return view('admin.post.edit');
        });
        Route::get('/add', function () {
            return view('admin.post.add');
        });
    });
    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return view('admin.user.list');
        });
        Route::get('/edit', function () {
            return view('admin.user.edit');
        });
        Route::get('/add', function () {
            return view('admin.user.add');
        });
    });
    Route::prefix('reputation')->group(function () {
        Route::get('/', function () {
            return view('admin.reputation.list');
        });
        Route::get('/edit', function () {
            return view('admin.reputation.edit');
        });
        Route::get('/add', function () {
            return view('admin.reputation.add');
        });
    });
    Route::prefix('tag')->group(function () {
        Route::get('/', function () {
            return view('admin.tag.list');
        });
        Route::get('/edit', function () {
            return view('admin.tag.edit');
        });
        Route::get('/add', function () {
            return view('admin.tag.add');
        });
    });
    Route::get('/', function () {
        return view('admin.layout.index');
    });
});
