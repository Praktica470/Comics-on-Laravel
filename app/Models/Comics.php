<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comics extends Model
{
    use HasFactory;

    protected $fillable = [
        'comics_title',
        'comics_description',
        'comics_cover_image_path',
        'user_id',
        'published_at'
    ];
}
