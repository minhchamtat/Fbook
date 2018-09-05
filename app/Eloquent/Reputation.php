<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Reputation extends Model
{
    protected $fillable = [
        'point',
        'user_id',
        'target_type',
        'target_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function target()
    {
        return $this->morphTo();
    }
}
