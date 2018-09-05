<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    protected $table = 'book_tag';

    protected $fillable = [
        'book_id',
        'tag_id',
    ];
}
