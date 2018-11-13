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
        'logo_admin' => 'admin_asset/assets/demo/default/media/img/logo/',
    ],

    'paginate' => [
        'user' => '10',
        'book' => '20',
        'book_profile' => 12,
        'follow_user' => 9,
        'book_request' => 5,
        'notifications' => 10,
        'review' => 3,
    ],

    'taking_numb' => [
        'best_sharing_book' => 5,
        'top_book' => 6,
        'latest_book' => 12,
    ],

    'random_numb' => [
        'book' => 3,
        'office' => 5,
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
        'dismiss' => 0,
    ],

    'limit' => [
        'related_book' => 8,
        'notifications' => 3,
    ],

    'notifications' => [
        'review' => 'Review your book: ',
        'follow' => 'Follow you',
        'vote' => 'Vote your review for the book: ',
        'upvote' => 'Upvote your review for the book: ',
        'downvote' => 'Upvote your review for the book: ',
        'waiting' => 'Borrowing your book: ',
        'returning' => 'Return your book: ',
        'reading' => 'Remember: You have to return book:',
        'prompt' => 'You will be returned book soon',
        'route' => [
            'book' => 'books.show',
            'user' => 'user',
            'review' => 'review.show',
            'owner_prompt' => 'my-request.index',
        ],
    ],
    'links' => [
        'feedback' => 'https://docs.google.com/forms/d/e/1FAIpQLSeVwREJ9vbPHB3LGDudz9ieePp3Z9xJG96e48_5i9VQj4r5zQ/viewform',
        'instruction' => '',
        'banner' => 'https://viblo.asia/announcements/gioi-thieu-state-of-chain-tieu-diem-hackathon-meet-up-blockchain-nam-2018-YWOZrpmp5Q0',
        'club' => 'https://www.facebook.com/groups/framgia.reading.book.club/',
        'wsm' => 'https://wsm.framgia.vn/',
        'fask' => 'http://ask.framgia.vn/',
        'fitm' => 'https://fitm.framgia.vn/',
        'fclub' => 'http://club.framgia.vn/',
        'fgas' => 'https://gas.framgia.vn/',
        'fsurvey' => 'http://survey.framgia.vn/',
    ],
    'social' => [
        'facebook' => 'https://www.facebook.com/FramgiaVietnam',
        'linkedIn' => 'https://www.linkedin.com/company/framgia-vietnam/',
        'gitHub' =>'https://github.com/framgia',
    ],

    'text' => '<p><br><i><b><span><h1><h2><h3><h4><h5><h6><strong><em>',
    'time' => 3600,
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

    'prompt' => [
        'time' => '+2 days',
        'loop_time' => '0 3 * * *',
    ],

];
