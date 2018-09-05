<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $table = 'book_user';

    protected $fillable = [
        'target_type',
        'approved',
        'days_to_read',
        'owner_id',
        'book_id',
        'user_id',
    ];
}
