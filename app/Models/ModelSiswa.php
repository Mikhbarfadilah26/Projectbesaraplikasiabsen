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
    ];

    protected $hidden = [
        'password',
    ];
}