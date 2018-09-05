<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'path',
        'priority',
        'height',
        'width',
        'target_type',
        'target_id',
    ];

    public function target()
    {
        return morphTo();
    }
}
