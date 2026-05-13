<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelUser extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'foto',
        'role'
    ];

    protected $hidden = [
        'password'
    ];
}