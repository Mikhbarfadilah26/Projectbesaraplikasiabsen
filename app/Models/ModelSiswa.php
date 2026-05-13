<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelSiswa extends Authenticatable
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'password',
        'foto',
        'jeniskelamin',
        'kelasid',
        'alamat'
    ];

    protected $hidden = [
        'password'
    ];

    /**
     * =========================
     * RELASI KE KELAS
     * =========================
     */
    public function kelas()
    {
        return $this->belongsTo(ModelKelas::class, 'kelasid');
    }
}