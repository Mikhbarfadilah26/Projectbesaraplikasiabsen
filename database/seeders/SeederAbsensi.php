<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SeederAbsensi extends Seeder
{
    public function run(): void
    {

        // ================= JURUSAN =================
        DB::table('jurusan')->updateOrInsert(
            ['namajurusan' => 'RPL'],
            [
                'icon' => 'fas fa-laptop-code',
                'deskripsi' => 'Pemrograman',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('jurusan')->updateOrInsert(
            ['namajurusan' => 'TKJ'],
            [
                'icon' => 'fas fa-network-wired',
                'deskripsi' => 'Jaringan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ================= USERS =================
        DB::table('users')->updateOrInsert(
            ['username' => 'admin'],
            [
                'nama' => 'Admin',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['username' => 'guru'],
            [
                'nama' => 'Guru',
                'password' => Hash::make('123'),
                'role' => 'guru',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ================= KELAS (MULTI GURU OK) =================
        DB::table('kelas')->updateOrInsert(
            ['namakelas' => 'X RPL 1'],
            [
                'tingkat' => 'X',
                'jurusanid' => 1,

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('kelas')->updateOrInsert(
            ['namakelas' => 'XI TKJ 1'],
            [
                'tingkat' => 'XI',
                'jurusanid' => 2,

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ================= SISWA =================
        DB::table('siswa')->updateOrInsert(
            ['nis' => '1001'],
            [
                'nama' => 'Budi',
                'password' => Hash::make('123'),
                'jeniskelamin' => 'L',
                'kelasid' => 1,
                'alamat' => 'Medan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('siswa')->updateOrInsert(
            ['nis' => '1002'],
            [
                'nama' => 'Siti',
                'password' => Hash::make('123'),
                'jeniskelamin' => 'P',
                'kelasid' => 1,
                'alamat' => 'Binjai',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ================= TAHUN =================
        DB::table('tahunajaran')->updateOrInsert(
            ['tahun' => '2025/2026'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table('pengumuman')->updateOrInsert(
            ['judul' => 'Persiapan Ujian Semester'],
            [
                'userid' => 1,
                'isi' => 'Semua siswa wajib belajar.',
                'tanggal' => Carbon::now()->toDateString(),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // ================= SEMESTER =================
        DB::table('semester')->updateOrInsert(
            ['nama' => 'ganjil'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('semester')->updateOrInsert(
            ['nama' => 'genap'],
            [
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ================= ABSENSI =================
        DB::table('absensi')->updateOrInsert(
            [
                'siswaid' => 1,
                'tanggal' => Carbon::now()->toDateString()
            ],
            [
                'guruid' => 2,
                'kelasid' => 1,
                'tahunid' => 1,
                'semesterid' => 1,
                'status' => 'hadir',
                'keterangan' => 'Hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
