<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fiilable = [
        'name',
        'description',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
