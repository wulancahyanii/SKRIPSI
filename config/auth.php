<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Tambahkan guard "juri" agar bisa punya sesi login terpisah
    |
    */

    'guards' => [
        // Guard untuk admin/panitia
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard untuk juri
        'juri' => [
            'driver' => 'session',
            'provider' => 'juris',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Provider menentukan model yang digunakan untuk setiap jenis user
    |
    */

    'providers' => [
        // Model untuk admin/panitia
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Model untuk juri
        'juris' => [
            'driver' => 'eloquent',
            'model' => App\Models\Juri::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Reset Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'juris' => [
            'provider' => 'juris',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];
