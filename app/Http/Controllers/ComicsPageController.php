<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;

class ComicsPageController extends Controller
{
    public function index($id) {
        $single_comics = Comics::find($id);
        
        return view('comics.comics-page')->with('single_comics', $single_comics);
    }
}
