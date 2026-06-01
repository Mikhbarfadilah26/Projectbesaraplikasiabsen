<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelUser;

class ModelPengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [

        'userid',
        'judul',
        'isi',
        'foto',
        'tanggal',
        'is_active'

    ];

    public function user()
    {
        return $this->belongsTo(
            ModelUser::class,
            'userid'
        );
    }
}