<?php

return [
    'reputation' => [
        'share_book' => 5,
        'vote' => '1',
        'follow' => 1,  
    ],

    'target_type' => [
    	'book' => 'App\Eloquent\Book',
    	'user' => 'App\Eloquent\User',
    	'vote' => 'App\Eloquent\Vote',
    ],

    'book_user' => [
        'type' => [
            'waiting' => 'waiting',
            'reading' => 'reading',
            'returned' => 'returned',
        ],
    ],

    'approved' => [
        'default' => 0,
        'checked' => 1,
    ],

    'roles' => [
        'admin' => 'Admin',
        'user' => 'User',
    ],
];
