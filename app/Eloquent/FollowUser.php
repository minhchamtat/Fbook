<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FollowUser extends Model
{
    use SoftDeletes;

    protected $table = 'follow_user';

    protected $fillable = [
        'following_id',
        'follower_id',
    ];

    public function following()
    {
        return $this->belongsTo(User::class, 'following_id');
    }

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function reputation()
    {
        return $this->morphOne(Reputation::class, 'target');
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'target');
    }
}
