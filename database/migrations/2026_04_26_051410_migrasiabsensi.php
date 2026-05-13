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

            $table->string('icon')->nullable();

            $table->text('deskripsi')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        | role:
        | - admin
        | - guru (otomatis wali kelas)
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('username')->unique();

            $table->string('password');

            $table->string('foto')->nullable();

            $table->enum('role', [
                'admin',
                'guru'
            ]);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | KELAS
        |--------------------------------------------------------------------------
        */
        Schema::create('kelas', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | CONTOH:
            | X RPL 1
            | XI TKJ 2
            |--------------------------------------------------------------------------
            */
            $table->string('namakelas');

            $table->enum('tingkat', [
                'X',
                'XI',
                'XII'
            ]);

            /*
            |--------------------------------------------------------------------------
            | RELASI JURUSAN
            |--------------------------------------------------------------------------
            */
            $table->foreignId('jurusanid')
                ->constrained('jurusan')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | WALI KELAS
            |--------------------------------------------------------------------------
            | 1 guru hanya bisa punya 1 kelas
            |--------------------------------------------------------------------------
            */
            $table->foreignId('guruid')
                ->nullable()
                ->unique()
                ->constrained('users')
                ->nullOnDelete();

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

            $table->string('foto')->nullable();

            $table->enum('jeniskelamin', [
                'L',
                'P'
            ]);

            /*
            |--------------------------------------------------------------------------
            | KELAS SISWA
            |--------------------------------------------------------------------------
            */
            $table->foreignId('kelasid')
                ->constrained('kelas')
                ->cascadeOnDelete();

            $table->text('alamat')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        */
        Schema::create('tahunajaran', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | CONTOH:
            | 2025/2026
            |--------------------------------------------------------------------------
            */
            $table->string('tahun');

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | SEMESTER
        |--------------------------------------------------------------------------
        */
        Schema::create('semester', function (Blueprint $table) {

            $table->id();

            $table->enum('nama', [
                'ganjil',
                'genap'
            ]);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | ABSENSI
        |--------------------------------------------------------------------------
        | Absensi manual oleh wali kelas
        |--------------------------------------------------------------------------
        */
        Schema::create('absensi', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | RELASI SISWA
            |--------------------------------------------------------------------------
            */
            $table->foreignId('siswaid')
                ->constrained('siswa')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | RELASI GURU / WALI KELAS
            |--------------------------------------------------------------------------
            */
            $table->foreignId('guruid')
                ->constrained('users')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | RELASI KELAS
            |--------------------------------------------------------------------------
            */
            $table->foreignId('kelasid')
                ->constrained('kelas')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | RELASI TAHUN AJARAN
            |--------------------------------------------------------------------------
            */
            $table->foreignId('tahunid')
                ->constrained('tahunajaran')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | RELASI SEMESTER
            |--------------------------------------------------------------------------
            */
            $table->foreignId('semesterid')
                ->constrained('semester')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | TANGGAL ABSEN
            |--------------------------------------------------------------------------
            */
            $table->date('tanggal');

            /*
            |--------------------------------------------------------------------------
            | STATUS ABSENSI
            |--------------------------------------------------------------------------
            */
            $table->enum('status', [

                'hadir',
                'izin',
                'sakit',
                'alpha',
                'cabut'

            ])->default('hadir');

            /*
            |--------------------------------------------------------------------------
            | KETERANGAN TAMBAHAN
            |--------------------------------------------------------------------------
            */
            $table->text('keterangan')->nullable();

            /*
            |--------------------------------------------------------------------------
            | MENCEGAH ABSENSI DOUBLE
            |--------------------------------------------------------------------------
            */
            $table->unique([
                'siswaid',
                'tanggal'
            ]);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */
        Schema::create('pengumuman', function (Blueprint $table) {

            $table->id();

            $table->foreignId('userid')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('judul');

            $table->text('isi');

            $table->date('tanggal');

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

        });

    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('semester');
        Schema::dropIfExists('tahunajaran');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('jurusan');
    }

};
