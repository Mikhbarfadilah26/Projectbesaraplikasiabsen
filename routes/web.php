<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

// LANDING
use App\Http\Controllers\Landing\ControllerLanding;

// AUTH
use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerAuthSiswa;
use App\Http\Controllers\ZonaSiswa\ControllerZonaSiswa;

// DASHBOARD
use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardGuru;
use App\Http\Controllers\Dashboard\ControllerDashboardSiswa;

// MASTER
use App\Http\Controllers\Master\ControllerSiswa;
use App\Http\Controllers\Master\ControllerKelas;
use App\Http\Controllers\Master\ControllerJurusan;
use App\Http\Controllers\Master\ControllerMapel;
use App\Http\Controllers\Master\ControllerSemester;
use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerTahunAjaran;
use App\Http\Controllers\Master\ControllerJadwalAbsensi;

// TRANSAKSI
use App\Http\Controllers\Transaksi\ControllerAbsensi;
use App\Http\Controllers\Transaksi\ControllerDetailAbsensi;

// LAPORAN
use App\Http\Controllers\Laporan\ControllerLaporan;

/*
|--------------------------------------------------------------------------
| PROFILE SISWA
|--------------------------------------------------------------------------
*/

Route::get(
    '/siswa/profile',
    [ControllerZonaSiswa::class, 'profile']
)->name('siswa.profile');

Route::get(
    '/siswa/laporan/cetak',
    [ControllerZonaSiswa::class, 'cetakLaporan']
)->name('siswa.laporan.cetak');

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::controller(ControllerLanding::class)->group(function () {

    Route::get('/', 'index')
        ->name('landing.home');

    Route::get('/tentang', 'tentang')
        ->name('landing.tentang');

    /*
|--------------------------------------------------------------------------
| JURUSAN
|--------------------------------------------------------------------------
*/

    Route::get('/jurusan', 'jurusan')
        ->name('landing.jurusan');

    // DETAIL JURUSAN
    Route::get('/jurusan/{id}', 'detailJurusan')
        ->name('landing.jurusan.detail');
    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    // HALAMAN LIST PENGUMUMAN
    Route::get('/pengumuman', 'pengumuman')
        ->name('landing.pengumuman');

    // DETAIL PENGUMUMAN DATABASE
    Route::get('/pengumuman/{id}', 'detailPengumuman')
        ->name('landing.pengumuman.detail');

    /*
    |--------------------------------------------------------------------------
    | MENU LAIN
    |--------------------------------------------------------------------------
    */

    Route::get('/jadwalumum', 'jadwalUmum')
        ->name('landing.jadwal');

    Route::get('/informasi', 'informasi')
        ->name('landing.informasi');

    Route::get('/kontak', 'kontak')
        ->name('landing.kontak');
});

/*
|--------------------------------------------------------------------------
| AUTH LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login-admin', [ControllerAuthUser::class, 'index'])
    ->name('login.user');

Route::post('/login-admin', [ControllerAuthUser::class, 'login'])
    ->name('login.user.process');

Route::get('/login-siswa', [ControllerAuthSiswa::class, 'index'])
    ->name('login.siswa');

Route::post('/login-siswa', [ControllerAuthSiswa::class, 'login'])
    ->name('login.siswa.process');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::post('/logout-siswa', function () {

    Auth::guard('siswa')->logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout.siswa');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [ControllerDashboardAdmin::class, 'index'])
            ->name('admin.dashboard');
    });

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:guru'])
    ->prefix('guru')
    ->group(function () {

        Route::get('/dashboard', [ControllerDashboardGuru::class, 'index'])
            ->name('guru.dashboard');
    });

/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:siswa'])
    ->prefix('siswa')
    ->group(function () {

        Route::get('/dashboard', [ControllerDashboardSiswa::class, 'index'])
            ->name('siswa.dashboard');

        Route::get('/absensi', [ControllerDashboardSiswa::class, 'absensi'])
            ->name('siswa.absensi');

        Route::get('/riwayat', [ControllerDashboardSiswa::class, 'riwayat'])
            ->name('siswa.riwayat');

        Route::post('/absensi/store', [ControllerAbsensi::class, 'store'])
            ->name('siswa.absensi.store');

        Route::put('/absensi/update/{id}', [ControllerAbsensi::class, 'update'])
            ->name('siswa.absensi.update');
    });

/*
|--------------------------------------------------------------------------
| MASTER CRUD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,guru'])
    ->prefix('master')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | MASTER DATA
        |--------------------------------------------------------------------------
        */

        Route::resource('kelas', ControllerKelas::class);

        Route::resource('jurusan', ControllerJurusan::class);

        Route::resource('siswa', ControllerSiswa::class);

        Route::resource('tahunajaran', ControllerTahunAjaran::class);

        Route::resource('semester', ControllerSemester::class);

        Route::resource('user', ControllerUser::class);

        Route::resource('jadwalabsensi', ControllerJadwalAbsensi::class);

        

        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI
        |--------------------------------------------------------------------------
        */

        Route::prefix('transaksi')->group(function () {

            Route::resource('absensi', ControllerAbsensi::class);

            Route::resource('detailabsensi', ControllerDetailAbsensi::class);
        });

        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::prefix('laporan')->group(function () {

            Route::get('/absensi', [ControllerLaporan::class, 'absensi'])
                ->name('laporan.absensi');
        });
    });
