<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'review_id',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reputation()
    {
        return $this->morphOne(Reputation::class, 'target');
    }
}
