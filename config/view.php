<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    'image_paths' => [
        'img' => 'assets/img/',
        'logo' => 'assets/img/logo/',
        'flag' => 'assets/img/flag/',
        'slide' => 'assets/img/slider/',
        'banner' => 'assets/img/banner/',
        'product' => 'assets/img/product/',
        'post' => 'assets/img/post/',
        'user' => 'assets/img/user/avatar/',
        'book' => 'storage/img/book/',
    ],

    'paginate' => [
        'user' => '10',
        'book' => '20',
        'book_profile' => 12,
        'follow_user' => 9,
        'book_request' => 5,
    ],

    'taking_numb' => [
        'best_sharing_book' => 5,
        'top_book' => 6,
        'latest_book' => 12,
    ],

    'random_numb' => [
        'book' => 3,
    ],

    'vote' => [
        'login' => 2,
        'up' => 'up',
        'down' => 'down',
        'no' => 'no',
        'nodown' => 'updown',
        'noup' => 'noup',
    ],

    'status' => [
        'sharing' => 'sharing',
    ],

    'role' => [
        'admin' => 'Admin',
        'editor' => 'Editor',
    ],

    'request' => [
        'waiting' => 'waiting',
        'reading' => 'reading',
        'returning' => 'returning',
        'returned' => 'returned',
        'cancel' => 'cancel',
        'approve' => 1,
        'dissmiss' => 0,
    ],
    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => realpath(storage_path('framework/views')),

];
