<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // JURUSAN
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('namajurusan');
            $table->timestamps();
        });

        // KELAS
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('namakelas');
            $table->string('tingkat');
            $table->foreignId('jurusanid')->constrained('jurusan')->cascadeOnDelete();
            $table->timestamps();
        });

        // SISWA
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->enum('jeniskelamin',['L','P']);
            $table->foreignId('kelasid')->constrained('kelas')->cascadeOnDelete();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });

        // MAPEL
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->string('namamapel');
            $table->timestamps();
        });

        // TAHUN AJARAN
        Schema::create('tahunajaran', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->timestamps();
        });

        // SEMESTER
        Schema::create('semester', function (Blueprint $table) {
            $table->id();
            $table->enum('nama',['ganjil','genap']);
            $table->timestamps();
        });

        // USERS
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role',['admin','guru']);
            $table->timestamps();
        });

        // STATUS ABSEN (BARU)
        Schema::create('statusabsen', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // hadir, izin, sakit, alpha
            $table->timestamps();
        });

        // JADWAL
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelasid')->constrained('kelas')->cascadeOnDelete();
            $table->foreignId('mapelid')->constrained('mapel')->cascadeOnDelete();
            $table->foreignId('userid')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tahunid')->constrained('tahunajaran')->cascadeOnDelete();
            $table->foreignId('semesterid')->constrained('semester')->cascadeOnDelete();

            $table->enum('hari',['senin','selasa','rabu','kamis','jumat','sabtu']);
            $table->time('jammulai');
            $table->time('jamselesai');

            $table->timestamps();
        });

        // ABSENSI
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');

            $table->foreignId('jadwalid')->constrained('jadwal')->cascadeOnDelete();
            $table->foreignId('userid')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tahunid')->constrained('tahunajaran')->cascadeOnDelete();
            $table->foreignId('semesterid')->constrained('semester')->cascadeOnDelete();

            $table->enum('status',['draft','selesai'])->default('draft');

            $table->timestamps();
        });

        // DETAIL ABSENSI (FIX)
        Schema::create('detailabsensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absensiid')->constrained('absensi')->cascadeOnDelete();
            $table->foreignId('siswaid')->constrained('siswa')->cascadeOnDelete();
            $table->foreignId('statusid')->constrained('statusabsen')->cascadeOnDelete();

            $table->time('jamabsen'); // 🔥 JAM MASUK

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detailabsensi');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('jadwal');
        Schema::dropIfExists('statusabsen');
        Schema::dropIfExists('users');
        Schema::dropIfExists('semester');
        Schema::dropIfExists('tahunajaran');
        Schema::dropIfExists('mapel');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('jurusan');
    }
};