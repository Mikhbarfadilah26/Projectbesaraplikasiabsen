<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelRegisterSiswa extends Model
{
    protected $table = 'register_siswa';

    protected $fillable = [

        'nis',
        'nama',
        'password',
        'jeniskelamin',
        'kelasid',
        'alamat',
        'status',
        'catatan',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KELAS
    |--------------------------------------------------------------------------
    */
    public function kelas()
    {
        return $this->belongsTo(
            ModelKelas::class,
            'kelasid'
        );
    }
}