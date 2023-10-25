<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image_path',
        'chapter_id'
    ];

    public function chapter() {
        return $this->belongsTo('App\Models\Chapter');
    }
}
