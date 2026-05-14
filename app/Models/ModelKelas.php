<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(ModelJurusan::class, 'jurusanid');
    }
}