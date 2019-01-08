<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use SoftDeletes;

    protected $table = 'owners';

    protected $fillable = [
        'book_id',
        'user_id',
    ];

    public function reputation()
    {
        return $this->morphOne(Reputation::class, 'target_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
