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

            $table->string('namakelas');

            $table->enum('tingkat', [
                'X',
                'XI',
                'XII'
            ]);

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

            $table->string('foto')->nullable();

            $table->enum('jeniskelamin', [
                'L',
                'P'
            ]);

            $table->foreignId('kelasid')
                ->constrained('kelas')
                ->cascadeOnDelete();

            $table->text('alamat')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | REGISTER SISWA
        |--------------------------------------------------------------------------
        | Pending approval admin/guru
        |--------------------------------------------------------------------------
        */
        Schema::create('register_siswa', function (Blueprint $table) {

            $table->id();

            $table->string('nis')->unique();

            $table->string('nama');

            $table->string('password');

            $table->enum('jeniskelamin', [
                'L',
                'P'
            ]);

            $table->foreignId('kelasid')
                ->constrained('kelas')
                ->cascadeOnDelete();

            $table->text('alamat')->nullable();

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            | pending
            | disetujui
            | ditolak
            |--------------------------------------------------------------------------
            */
            $table->enum('status', [
                'pending',
                'disetujui',
                'ditolak'
            ])->default('pending');

            $table->text('catatan')->nullable();

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
        */
        Schema::create('absensi', function (Blueprint $table) {

            $table->id();

            $table->foreignId('siswaid')
                ->constrained('siswa')
                ->cascadeOnDelete();

            $table->foreignId('guruid')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('kelasid')
                ->constrained('kelas')
                ->cascadeOnDelete();

            $table->foreignId('tahunid')
                ->constrained('tahunajaran')
                ->cascadeOnDelete();

            $table->foreignId('semesterid')
                ->constrained('semester')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->enum('status', [

                'hadir',
                'izin',
                'sakit',
                'alpha',
                'cabut'

            ])->default('hadir');

            $table->text('keterangan')->nullable();

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
        Schema::dropIfExists('register_siswa');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('jurusan');
    }

};