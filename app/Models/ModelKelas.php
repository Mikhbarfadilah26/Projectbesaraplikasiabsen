<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelKelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'namakelas',
        'jurusanid',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE JURUSAN
    |--------------------------------------------------------------------------
    */

    public function jurusan()
    {
        return $this->belongsTo(ModelJurusan::class, 'jurusanid');
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE SISWA
    |--------------------------------------------------------------------------
    */

    public function siswa()
    {
        return $this->hasMany(ModelSiswa::class, 'kelasid');
    }
}