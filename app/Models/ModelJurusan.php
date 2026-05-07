<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelJurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'namajurusan'
    ];

    // RELASI
    public function kelas(){
        return $this->hasMany(ModelKelas::class,'jurusanid');
    }
}