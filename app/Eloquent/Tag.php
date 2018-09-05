<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fiilable = [
        'name',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
