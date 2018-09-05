<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'send_id',
        'receive_id',
        'target_type',
        'target_id',
        'viewed',
    ];

    public function userSend()
    {
        return $this->belongsTo(User::class, 'send_id');
    }

    public function userReceive()
    {
        return $this->belongsTo(User::class, 'receive_id');
    }
}
