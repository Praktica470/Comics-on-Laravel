<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'comics_id'
    ];

    public function comics() {
        return $this->belongsTo('App\Models\Comics');
    }

    public function pages() {
        return $this->hasMany('App\Models\Page');
    }
}
