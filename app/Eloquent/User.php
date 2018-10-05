<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'employee_code',
        'position',
        'reputation_point',
        'avatar',
        'workspace',
        'office_id',
        'chatwork_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function ownerBooks()
    {
        return $this->belongsToMany(Book::class, 'owners');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class)
            ->withPivot('type', 'approved', 'owner_id', 'created_at', 'days_to_read');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reputations()
    {
        return $this->hasMany(Reputation::class);
    }

    public function updateBooks()
    {
        return $this->hasMany(UpdateBook::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_user', 'follower_id', 'id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follow_user', 'following_id', 'id');
    }
}
