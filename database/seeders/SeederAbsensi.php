<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeederAbsensi extends Seeder
{
    public function run(): void
    {
        // =====================
        // JURUSAN
        // =====================
        DB::table('jurusan')->insert([
            [
                'namajurusan' => 'RPL',
                'icon' => 'fas fa-laptop-code',
                'deskripsi' => 'Mempelajari pemrograman, website, aplikasi, dan software modern.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'namajurusan' => 'TKJ',
                'icon' => 'fas fa-network-wired',
                'deskripsi' => 'Mempelajari jaringan komputer, server, dan infrastruktur IT.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // =====================
        // KELAS
        // =====================
        DB::table('kelas')->insert([
            ['namakelas' => 'X RPL 1', 'tingkat' => 'X', 'jurusanid' => 1],
            ['namakelas' => 'XI TKJ 1', 'tingkat' => 'XI', 'jurusanid' => 2],
        ]);

        // =====================
        // SISWA
        // =====================
        DB::table('siswa')->insert([
            [
                'nis' => '1001',
                'nama' => 'Budi Santoso',
                'password' => Hash::make('123'),
                'jeniskelamin' => 'L',
                'kelasid' => 1,
                'alamat' => 'Medan'
            ],
            [
                'nis' => '1002',
                'nama' => 'Siti Aisyah',
                'password' => Hash::make('123'),
                'jeniskelamin' => 'P',
                'kelasid' => 1,
                'alamat' => 'Binjai'
            ],
            [
                'nis' => '1003',
                'nama' => 'Rizky Ramadhan',
                'password' => Hash::make('123'),
                'jeniskelamin' => 'L',
                'kelasid' => 2,
                'alamat' => 'Deli Serdang'
            ],
        ]);

        // =====================
        // USERS
        // =====================
        DB::table('users')->insert([
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'nama' => 'Guru',
                'username' => 'guru',
                'password' => Hash::make('123'),
                'role' => 'guru'
            ],
        ]);

        // =====================
        // TAHUN AJARAN
        // =====================
        DB::table('tahunajaran')->insert([
            ['tahun' => '2025/2026']
        ]);

        // =====================
        // SEMESTER
        // =====================
        DB::table('semester')->insert([
            ['nama' => 'ganjil'],
            ['nama' => 'genap'],
        ]);

        // =====================
        // ABSENSI
        // =====================
        DB::table('absensi')->insert([
            [
                'siswaid' => 1,
                'tahunid' => 1,
                'semesterid' => 1,
                'tanggal' => now()->toDateString(),

                'jam_masuk' => '07:05:00',
                'status_masuk' => 'hadir',

                'jam_pulang' => '15:00:00',
                'status_pulang' => 'hadir',
            ],
            [
                'siswaid' => 2,
                'tahunid' => 1,
                'semesterid' => 1,
                'tanggal' => now()->toDateString(),

                'jam_masuk' => '07:10:00',
                'status_masuk' => 'izin',

                'jam_pulang' => '15:10:00',
                'status_pulang' => 'hadir',
            ],
        ]);

        // =====================
        // DETAIL ABSENSI
        // =====================
        DB::table('detailabsensi')->insert([
            [
                'absensiid' => 1,
                'keterangan' => 'Masuk tepat waktu'
            ],
            [
                'absensiid' => 2,
                'keterangan' => 'Izin masuk karena sakit'
            ],
        ]);

        // =====================
        // PENGUMUMAN
        // =====================
        DB::table('pengumuman')->insert([

            [
                'judul' => 'Persiapan Ujian Semester',

                'isi' =>
                    'Seluruh siswa diharapkan mempersiapkan diri untuk menghadapi ujian semester yang akan dimulai minggu depan.',

                'tanggal' => now(),

                'is_active' => true,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Jadwal Piket Laboratorium',

                'isi' =>
                    'Siswa jurusan RPL diwajibkan mengikuti jadwal piket laboratorium sesuai pembagian kelompok.',

                'tanggal' => now(),

                'is_active' => true,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Libur Nasional',

                'isi' =>
                    'Kegiatan belajar mengajar diliburkan pada tanggal 17 Agustus dalam rangka Hari Kemerdekaan Indonesia.',

                'tanggal' => now(),

                'is_active' => true,

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}