<?php

return [
    'user' => [
        'status' => [
            'inactive' => 1,
            'active' => 2,
            'wait_accept' => 3,
        ],
        'roles' => [
            'admin' => 1,
            'user' => 2,
        ],
        'upload_folder' => 'users',
    ],
    'admin_email' => [
        'admin' => env('MAIL_ADMIN', 'admin@md-sass.com'),
        'infor' => env('MAIL_INFOR', 'info@md-sass.com'),
        'support' => env('MAIL_SUPPORT', 'support@md-sass.com'),
        'staff' => env('MAIL_STAFF', 'staff@md-sass.com'),
        'test' => env('MAIL_TEST', 'duongnd@scuti.asia'),
        'test_jp' => env('MAIL_TEST_JP', 'k-tomita@neowing.co.jp'),
        'no_reply' => env('MAIL_NO_REPLY', 'no-reply@md-sass.com'),
        'artists_md' => env('MAIL_ARTISTS_MD', 'artists_md-sass@av.avex.co.jp'),
        'avex_co_jp' => env('MAIL_AVEX_CO_JP', 'ecbd@av.avex.co.jp'),
        'support_merchbar' => env('MAIL_SUPPORT_MERCHBAR', 'support@merchbar.com'),
    ],
    'post' => [
        'type' => [
            'banner' => 1,
            'post' => 2,
            'introduce' => 3,
            'new' => 3,
        ],
    ],
];
