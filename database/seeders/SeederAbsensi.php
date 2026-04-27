<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeederAbsensi extends Seeder
{
    public function run(): void
    {
        DB::table('jurusan')->insert([
            ['namajurusan' => 'RPL'],
            ['namajurusan' => 'TKJ'],
        ]);

        DB::table('kelas')->insert([
            ['namakelas' => 'X RPL 1', 'tingkat' => 'X', 'jurusanid' => 1],
            ['namakelas' => 'XI TKJ 1', 'tingkat' => 'XI', 'jurusanid' => 2],
        ]);

        DB::table('siswa')->insert([
            [
                'nis' => '1001',
                'nama' => 'Budi',
                'jeniskelamin' => 'L',
                'kelasid' => 1,
                'alamat' => 'Medan'
            ],
            [
                'nis' => '1002',
                'nama' => 'Siti',
                'jeniskelamin' => 'P',
                'kelasid' => 1,
                'alamat' => 'Medan'
            ],
        ]);

        DB::table('mapel')->insert([
            ['namamapel' => 'Pemrograman'],
            ['namamapel' => 'Jaringan'],
        ]);

        DB::table('tahunajaran')->insert([
            ['tahun' => '2025/2026']
        ]);

        DB::table('semester')->insert([
            ['nama' => 'ganjil'],
            ['nama' => 'genap'],
        ]);

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

        // STATUS ABSEN
        DB::table('statusabsen')->insert([
            ['nama' => 'hadir'],
            ['nama' => 'izin'],
            ['nama' => 'sakit'],
            ['nama' => 'alpha'],
        ]);

        DB::table('jadwal')->insert([
            [
                'kelasid' => 1,
                'mapelid' => 1,
                'userid' => 2,
                'tahunid' => 1,
                'semesterid' => 1,
                'hari' => 'senin',
                'jammulai' => '08:00:00',
                'jamselesai' => '10:00:00'
            ]
        ]);

        DB::table('absensi')->insert([
            [
                'tanggal' => now(),
                'jadwalid' => 1,
                'userid' => 2,
                'tahunid' => 1,
                'semesterid' => 1,
                'status' => 'selesai'
            ]
        ]);

        DB::table('detailabsensi')->insert([
            [
                'absensiid' => 1,
                'siswaid' => 1,
                'statusid' => 1,
                'jamabsen' => '08:05:00'
            ],
            [
                'absensiid' => 1,
                'siswaid' => 2,
                'statusid' => 2,
                'jamabsen' => '08:10:00'
            ]
        ]);
    }
}