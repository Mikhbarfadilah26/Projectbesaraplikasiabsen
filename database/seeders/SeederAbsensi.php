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

        /*
        |--------------------------------------------------------------------------
        | JURUSAN
        |--------------------------------------------------------------------------
        */
        DB::table('jurusan')->insert([

            [
                'namajurusan' => 'RPL',
                'icon' => 'fas fa-laptop-code',
                'deskripsi' => 'Mempelajari pemrograman web, aplikasi, software dan database.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'namajurusan' => 'TKJ',
                'icon' => 'fas fa-network-wired',
                'deskripsi' => 'Mempelajari jaringan komputer dan server.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        DB::table('users')->insert([

            [
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'foto' => null,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Guru',
                'username' => 'guru',
                'password' => Hash::make('123'),
                'foto' => null,
                'role' => 'guru',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | KELAS
        |--------------------------------------------------------------------------
        | guruid = 2 (user guru)
        |--------------------------------------------------------------------------
        */
        DB::table('kelas')->insert([

            [
                'namakelas' => 'X RPL 1',
                'tingkat' => 'X',
                'jurusanid' => 1,
                'guruid' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'namakelas' => 'XI TKJ 1',
                'tingkat' => 'XI',
                'jurusanid' => 2,
                'guruid' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | SISWA
        |--------------------------------------------------------------------------
        */
        DB::table('siswa')->insert([

            [
                'nis' => '1001',
                'nama' => 'Budi Santoso',
                'password' => Hash::make('123'),
                'foto' => null,
                'jeniskelamin' => 'L',
                'kelasid' => 1,
                'alamat' => 'Medan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nis' => '1002',
                'nama' => 'Siti Aisyah',
                'password' => Hash::make('123'),
                'foto' => null,
                'jeniskelamin' => 'P',
                'kelasid' => 1,
                'alamat' => 'Binjai',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        */
        DB::table('tahunajaran')->insert([

            [
                'tahun' => '2025/2026',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        /*
        |--------------------------------------------------------------------------
        | SEMESTER
        |--------------------------------------------------------------------------
        */
        DB::table('semester')->insert([

            [
                'nama' => 'ganjil',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'genap',
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | ABSENSI
        |--------------------------------------------------------------------------
        | guru id 2 = wali kelas X RPL 1
        |--------------------------------------------------------------------------
        */
        DB::table('absensi')->insert([

            [
                'siswaid' => 1,
                'guruid' => 2,
                'kelasid' => 1,
                'tahunid' => 1,
                'semesterid' => 1,
                'tanggal' => Carbon::now()->toDateString(),
                'status' => 'hadir',
                'keterangan' => 'Hadir tepat waktu',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'siswaid' => 2,
                'guruid' => 2,
                'kelasid' => 1,
                'tahunid' => 1,
                'semesterid' => 1,
                'tanggal' => Carbon::now()->toDateString(),
                'status' => 'cabut',
                'keterangan' => 'Keluar saat jam pelajaran',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */
        DB::table('pengumuman')->insert([

            [
                'userid' => 1,
                'judul' => 'Persiapan Ujian Semester',
                'isi' => 'Seluruh siswa diwajibkan mempersiapkan diri menghadapi ujian semester.',
                'tanggal' => now(),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'userid' => 1,
                'judul' => 'Libur Nasional',
                'isi' => 'Sekolah diliburkan pada tanggal 17 Agustus.',
                'tanggal' => now(),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}