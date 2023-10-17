<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Genre;
use App\Models\Comics;

class GenresToComics extends Model
{
    use HasFactory;

    protected $fillable = [
        'comics_id',
        'genre_id'
    ];

    public function getGenre() {

        return Genre::where('id', $this->genre_id)->first();

    }
}
