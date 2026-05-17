<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelLibur;

class ModelLiburSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelLibur::insert([

            [
                'tanggal' => '2026-01-01',
                'keterangan' => 'Tahun Baru',
                'jenis' => 'nasional',
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'tanggal' => '2026-08-17',
                'keterangan' => 'Hari Kemerdekaan',
                'jenis' => 'nasional',
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'tanggal' => '2026-12-25',
                'keterangan' => 'Hari Natal',
                'jenis' => 'nasional',
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'tanggal' => '2026-06-15',
                'keterangan' => 'Libur Sekolah',
                'jenis' => 'sekolah',
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}