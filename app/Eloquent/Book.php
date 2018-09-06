<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author',
        'publish_date',
        'total_pages',
        'avg_star',
        'sku',
        'count_viewed',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function owners()
    {
        return $this->belongsToMany(User::class, 'owners');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('type', 'approved', 'owner_id', 'created_at', 'days_to_read');
    }

    public function bookmetas()
    {
        return $this->hasMany(Bookmeta::class);
    }

    public function updateBooks()
    {
        return $this->hasMany(UpdateBook::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'target');
    }
}
