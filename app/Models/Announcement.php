<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{
    protected $fillable = [
        'title', 'description', 'image_urls', 'price'
    ];

    protected $casts = [
        'image_urls' => 'array'
    ];
}
