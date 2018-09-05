<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UpdateBook extends Model
{
    protected $table = 'update_books';

    protected $fillable = [
        'user_id',
        'book_id',
        'title',
        'description',
        'author',
        'publish_date',
        'total_pages',
        'sku',
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
