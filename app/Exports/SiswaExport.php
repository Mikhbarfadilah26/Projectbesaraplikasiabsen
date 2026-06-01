<?php

namespace App\Exports;

use App\Models\ModelSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ModelSiswa::select(
            'nis',
            'nama',
            'jeniskelamin',
            'kelasid',
            'nama_ortu',
            'wa_ortu',
            'alamat'
        )->get();
    }

    public function headings(): array
    {
        return [
            'nis',
            'nama',
            'jeniskelamin',
            'kelasid',
            'nama_ortu',
            'wa_ortu',
            'alamat',
        ];
    }
}