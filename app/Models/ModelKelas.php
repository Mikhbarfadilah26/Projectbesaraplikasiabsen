<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'namakelas',
        'tingkat',
        'jurusanid'
    ];

    // RELASI
    public function jurusan(){
        return $this->belongsTo(ModelJurusan::class,'jurusanid');
    }

    public function siswa(){
        return $this->hasMany(ModelSiswa::class,'kelasid');
    }
}