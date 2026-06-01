<?php

namespace App\Imports;

use App\Models\ModelSiswa;

use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // CEK NIS SUDAH ADA
        $cek = ModelSiswa::where(
            'nis',
            $row['nis']
        )->first();

        // JIKA SUDAH ADA -> SKIP
        if ($cek) {
            return null;
        }

        // TAMBAH DATA BARU
        return new ModelSiswa([

            'nis'           => $row['nis'],
            'nama'          => $row['nama'],

            'password'      => Hash::make('123456'),

            'jeniskelamin'  => $row['jeniskelamin'],
            'kelasid'       => $row['kelasid'],

            'nama_ortu'     => $row['nama_ortu'] ?? null,
            'wa_ortu'       => $row['wa_ortu'] ?? null,

            'alamat'        => $row['alamat'] ?? null,

        ]);
    }
}