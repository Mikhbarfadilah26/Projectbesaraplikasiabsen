<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | JURUSAN
        |--------------------------------------------------------------------------
        */
        Schema::create('jurusan', function (Blueprint $table) {

            $table->id();

            $table->string('namajurusan');

            // ICON LANDING
            $table->string('icon')->nullable();

            // DESKRIPSI LANDING
            $table->text('deskripsi')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | KELAS
        |--------------------------------------------------------------------------
        */
        Schema::create('kelas', function (Blueprint $table) {

            $table->id();

            $table->string('namakelas');

            $table->string('tingkat');

            $table->foreignId('jurusanid')
                ->constrained('jurusan')
                ->cascadeOnDelete();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | SISWA
        |--------------------------------------------------------------------------
        */
        Schema::create('siswa', function (Blueprint $table) {

            $table->id();

            $table->string('nis')->unique();

            $table->string('nama');

            $table->string('password');

            $table->enum('jeniskelamin', ['L', 'P']);

            $table->foreignId('kelasid')
                ->constrained('kelas')
                ->cascadeOnDelete();

            $table->text('alamat')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('username')->unique();

            $table->string('password');

            $table->enum('role', ['admin', 'guru']);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        */
        Schema::create('tahunajaran', function (Blueprint $table) {

            $table->id();

            $table->string('tahun');

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | SEMESTER
        |--------------------------------------------------------------------------
        */
        Schema::create('semester', function (Blueprint $table) {

            $table->id();

            $table->enum('nama', ['ganjil', 'genap']);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | ABSENSI
        |--------------------------------------------------------------------------
        */
        Schema::create('absensi', function (Blueprint $table) {

            $table->id();

            $table->foreignId('siswaid')
                ->constrained('siswa')
                ->cascadeOnDelete();

            $table->foreignId('tahunid')
                ->constrained('tahunajaran')
                ->cascadeOnDelete();

            $table->foreignId('semesterid')
                ->constrained('semester')
                ->cascadeOnDelete();

            $table->date('tanggal');

            /*
            |--------------------------------------------------------------------------
            | ABSENSI MASUK
            |--------------------------------------------------------------------------
            */
            $table->time('jam_masuk')->nullable();

            $table->enum('status_masuk', [
                'hadir',
                'izin',
                'sakit',
                'alpha'
            ])->nullable();

            /*
            |--------------------------------------------------------------------------
            | ABSENSI PULANG
            |--------------------------------------------------------------------------
            */
            $table->time('jam_pulang')->nullable();

            $table->enum('status_pulang', [
                'hadir',
                'izin',
                'sakit',
                'alpha'
            ])->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | DETAIL ABSENSI
        |--------------------------------------------------------------------------
        */
        Schema::create('detailabsensi', function (Blueprint $table) {

            $table->id();

            $table->foreignId('absensiid')
                ->constrained('absensi')
                ->cascadeOnDelete();

            $table->string('keterangan')->nullable();
            // contoh:
            // telat
            // pulang cepat
            // izin guru

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */
        Schema::create('pengumuman', function (Blueprint $table) {

            $table->id();

            $table->string('judul');

            $table->text('isi');

            $table->date('tanggal');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });

    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
        Schema::dropIfExists('detailabsensi');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('semester');
        Schema::dropIfExists('tahunajaran');
        Schema::dropIfExists('users');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('jurusan');
    }

};