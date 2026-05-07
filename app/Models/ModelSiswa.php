<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelSiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'kelasid',
        'jk',
        'alamat',
        'notelp',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE KELAS
    |--------------------------------------------------------------------------
    */

    public function kelas()
    {
        return $this->belongsTo(ModelKelas::class, 'kelasid');
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE ABSENSI
    |--------------------------------------------------------------------------
    */

    public function absensi()
    {
        return $this->hasMany(ModelAbsensi::class, 'siswaid');
    }
}