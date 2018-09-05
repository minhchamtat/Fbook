<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UpdateBook extends Model
{
    protected $table = 'update_books';

    protected $fillable = [
        'title',
        'description',
        'author'
        'pulish_date',
        'total_pages',
        'sku',
        'user_id',
        'book_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
