<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class RoleUSer extends Model
{
    protected $table = 'role_user';

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
