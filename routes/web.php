<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerAuthSiswa;
use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardGuru;
use App\Http\Controllers\Dashboard\ControllerDashboardSiswa;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Master\ControllerSiswa;
use App\Http\Controllers\Master\ControllerKelas;
use App\Http\Controllers\Master\ControllerJurusan;
use App\Http\Controllers\Master\ControllerMapel;
use App\Http\Controllers\Master\ControllerSemester;
use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerTahunAjaran;
use App\Http\Controllers\Transaksi\ControllerAbsensi;
use App\Http\Controllers\Transaksi\ControllerDetailAbsensi;
use App\Http\Controllers\Laporan\ControllerLaporan;


/*

|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [ControllerDashboardAdmin::class, 'index'])
        ->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:guru'])->prefix('guru')->group(function () {

    Route::get('/dashboard', [ControllerDashboardGuru::class, 'index'])
        ->name('guru.dashboard');
});
/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:siswa'])->prefix('siswa')->group(function () {

    Route::get('/dashboard', [ControllerDashboardSiswa::class, 'index'])
        ->name('siswa.dashboard');
});

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::controller(ControllerLanding::class)->group(function () {

    Route::get('/', 'index')->name('landing.home');
    Route::get('/tentang', 'tentang')->name('landing.tentang');
    Route::get('/pengumuman', 'pengumuman')->name('landing.pengumuman');
    Route::get('/jadwalumum', 'jadwalUmum')->name('landing.jadwal');
    Route::get('/informasi', 'informasi')->name('landing.informasi');
    Route::get('/kontak', 'kontak')->name('landing.kontak');
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
| LOGOUT SISWA & USER(ADMIN DAN GURU)
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    Auth::logout(); // logout user
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');


Route::post('/logout-siswa', function () {
    Auth::guard('siswa')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});
/*
|--------------------------------------------------------------------------
| MENU CRUD PADA MENU USERS(ADMIN&GURU)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,guru'])->prefix('master')->group(function () {
    Route::resource('kelas', ControllerKelas::class);
    Route::resource('jurusan', ControllerJurusan::class);
    Route::resource('siswa', ControllerSiswa::class);
    Route::resource('tahunajaran', ControllerTahunAjaran::class);
    Route::resource('user', ControllerUser::class);
    Route::resource('semester', ControllerSemester::class);

    /*
|--------------------------------------------------------------------------
| MENU CRUD PADA MENU USERS(ADMIN&GURU) MENU TRANSAKSI
|--------------------------------------------------------------------------
*/
    Route::prefix('transaksi')->group(function () {
        Route::resource('absensi', ControllerAbsensi::class);

        Route::resource('detailabsensi', ControllerDetailAbsensi::class);
    });
    /*
|--------------------------------------------------------------------------
| MENU LAPORAN PADA USERS 
|--------------------------------------------------------------------------
*/
    Route::prefix('laporan')->group(function () {
        Route::get('absensi', [ControllerLaporan::class, 'absensi'])
            ->name('laporan.absensi');
    });
    Route::middleware(['auth:siswa'])->prefix('siswa')->group(function () {
    Route::get('/dashboard', [ControllerDashboardSiswa::class, 'index'])->name('siswa.dashboard');
    
    // Halaman Proses Absen
    Route::get('/absensi', [ControllerDashboardSiswa::class, 'absensi'])->name('siswa.absensi');
    
    // Halaman Riwayat
    Route::get('/riwayat', [ControllerDashboardSiswa::class, 'riwayat'])->name('siswa.riwayat');
});

// Route Store (Gunakan Resource yang sudah ada atau buat manual)
Route::post('/siswa/absensi/store', [ControllerAbsensi::class, 'store'])->name('absensi.store');
Route::put('/siswa/absensi/update/{id}', [ControllerAbsensi::class, 'update'])->name('absensi.update');
});
