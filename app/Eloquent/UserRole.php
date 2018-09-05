<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_role';

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
