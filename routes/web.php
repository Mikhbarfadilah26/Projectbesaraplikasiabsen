<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerAuthSiswa;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::controller(ControllerLanding::class)->group(function () {
    Route::get('/', 'index')->name('landing.home');
    Route::get('/tentang', 'tentang')->name('landing.tentang');
    Route::get('/pengumuman', 'pengumuman')->name('landing.pengumuman');
    Route::get('/jadwalumum', 'jadwalUmum')->name('landing.jadwalumum');
    Route::get('/informasi', 'informasi')->name('landing.informasi');
    Route::get('/kontak', 'kontak')->name('landing.kontak');
});

/*
|--------------------------------------------------------------------------
| AUTH LOGIN
|--------------------------------------------------------------------------
*/

// LOGIN FORM (GET)
Route::get('/login-admin', [ControllerAuthUser::class, 'index'])
    ->name('login.user');

Route::get('/login-siswa', [ControllerAuthSiswa::class, 'index'])
    ->name('login.siswa');

// PROSES LOGIN (POST)
Route::post('/login-admin', [ControllerAuthUser::class, 'login'])
    ->name('login.user.process');

Route::post('/login-siswa', [ControllerAuthSiswa::class, 'login'])
    ->name('login.siswa.process');