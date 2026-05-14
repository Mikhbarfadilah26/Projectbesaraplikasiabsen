<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Landing\ControllerLanding;

use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerAuthSiswa;
use App\Http\Controllers\Auth\ControllerRegisterSiswa;

use App\Http\Controllers\ZonaSiswa\ControllerZonaSiswa;

use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardGuru;
use App\Http\Controllers\Dashboard\ControllerDashboardSiswa;

use App\Http\Controllers\Master\ControllerSiswa;
use App\Http\Controllers\Master\ControllerKelas;
use App\Http\Controllers\Master\ControllerJurusan;
use App\Http\Controllers\Master\ControllerSemester;
use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerTahunAjaran;
use App\Http\Controllers\Master\ControllerJadwalAbsensi;
use App\Http\Controllers\Master\ControllerPengumuman;

use App\Http\Controllers\Transaksi\ControllerAbsensi;
use App\Http\Controllers\Transaksi\ControllerDetailAbsensi;

use App\Http\Controllers\Laporan\ControllerLaporan;

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::controller(ControllerLanding::class)->group(function () {

    Route::get('/', 'index')->name('landing.home');
    Route::get('/tentang', 'tentang')->name('landing.tentang');

    Route::get('/jurusan', 'jurusan')->name('landing.jurusan');
    Route::get('/jurusan/{id}', 'detailJurusan')->name('landing.jurusan.detail');

    Route::get('/pengumuman', 'pengumuman')->name('landing.pengumuman');
    Route::get('/pengumuman/detail/{id}', 'detailPengumuman')->name('landing.pengumuman.detail');

    Route::get('/jadwalumum', 'jadwalUmum')->name('landing.jadwal');
    Route::get('/informasi', 'informasi')->name('landing.informasi');
    Route::get('/kontak', 'kontak')->name('landing.kontak');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login-admin', [ControllerAuthUser::class, 'index'])->name('login.user');
Route::post('/login-admin', [ControllerAuthUser::class, 'login'])->name('login.user.process');

Route::get('/login-siswa', [ControllerAuthSiswa::class, 'index'])->name('login.siswa');
Route::post('/login-siswa', [ControllerAuthSiswa::class, 'login'])->name('login.siswa.process');

/*
|--------------------------------------------------------------------------
| REGISTER SISWA
|--------------------------------------------------------------------------
*/

Route::get('/register-siswa', [ControllerRegisterSiswa::class, 'index'])->name('register.siswa');
Route::post('/register-siswa/store', [ControllerRegisterSiswa::class, 'store'])->name('register.siswa.store');

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
        Route::get('/siswa/setujui/{id}', [ControllerSiswa::class, 'setujui'])
            ->name('master.siswa.setujui');

        Route::get('/siswa/tolak/{id}', [ControllerSiswa::class, 'tolak'])
            ->name('master.siswa.tolak');
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
        Route::get('/siswa/setujui/{id}', [ControllerSiswa::class, 'setujui'])
            ->name('master.siswa.setujui');

        Route::get('/siswa/tolak/{id}', [ControllerSiswa::class, 'tolak'])
            ->name('master.siswa.tolak');
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

        Route::get('/laporan', [ControllerDashboardSiswa::class, 'laporan'])
            ->name('siswa.laporan');

        Route::post('/absensi/store', [ControllerAbsensi::class, 'store'])
            ->name('siswa.absensi.store');

        Route::put('/absensi/update/{id}', [ControllerAbsensi::class, 'update'])
            ->name('siswa.absensi.update');

        // ✅ FIX ERROR YANG KAMU ALAMI
        Route::get('/profile', function () {
            return view('zonasiswa.profile.index');
        })->name('siswa.profile');
    });

/*
|--------------------------------------------------------------------------
| MASTER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,guru'])
    ->prefix('master')
    ->group(function () {

        Route::resource('kelas', ControllerKelas::class);
        Route::resource('jurusan', ControllerJurusan::class);
        Route::resource('siswa', ControllerSiswa::class);
        Route::resource('tahunajaran', ControllerTahunAjaran::class);
        Route::resource('semester', ControllerSemester::class);
        Route::resource('user', ControllerUser::class);
        Route::resource('jadwalabsensi', ControllerJadwalAbsensi::class);
        Route::resource('pengumuman', ControllerPengumuman::class);

        /*
    |--------------------------------------------------------------------------
    | ABSENSI
    |--------------------------------------------------------------------------
    */

        Route::prefix('transaksi')->group(function () {

            Route::resource('absensi', ControllerAbsensi::class);

            // ❌ DIHAPUS: create manual (sudah ada resource)
            // ❌ DIHAPUS: duplicate absensi.create

            // ✔ TAMBAHAN BULK
            Route::post('/absensi/bulk', [ControllerAbsensi::class, 'storeBulk'])
                ->name('absensi.store.bulk');

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
