<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'tingkat',
        'jurusanid'
    ];

    public function jurusan()
    {
        return $this->belongsTo(ModelJurusan::class, 'jurusanid');
    }
}