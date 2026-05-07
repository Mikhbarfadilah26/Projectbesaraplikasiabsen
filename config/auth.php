<?php

use App\Models\User;

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |----------------------------------------------------------------------
    | GUARDS
    |----------------------------------------------------------------------
    */
    'guards' => [

        // 🔵 DEFAULT (ADMIN & GURU)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // 🟡 TAMBAHAN SISWA
        'siswa' => [
            'driver' => 'session',
            'provider' => 'siswa',
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | PROVIDERS
    |----------------------------------------------------------------------
    */
    'providers' => [

        // 🔵 USER (ADMIN & GURU)
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\ModelUser::class,
        ],

        // 🟡 SISWA
        'siswa' => [
            'driver' => 'eloquent',
            'model' => App\Models\ModelSiswa::class,
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | PASSWORD RESET
    |----------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];