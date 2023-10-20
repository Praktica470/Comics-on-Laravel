<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;
use App\Models\GenresToComics;

class ComicsPageController extends Controller
{
    public function index($id) {
        $single_comics = Comics::find($id);
        $genres = GenresToComics::where('comics_id', '=', $single_comics->id)
        ->join('genres', 'genres.id', '=', 'genres_to_comics.genre_id')->get();
        
        return view('comics.comics-page')->with([
            'single_comics' => $single_comics,
            'genres' => $genres
        ]);
    }
}
