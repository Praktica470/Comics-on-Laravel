<?php

namespace App\Http\Controllers;

use App\Models\Comics;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Genre;
use App\Models\GenresToComics;
use App\Models\Chapter;
use App\Models\Page;


class CreatedComicsController extends Controller
{
    public function index() {

        $genres = Genre::all();
        return view('createtool')->with('genres', $genres);

    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'genre' => ['required', 'min:1']
        ]);

        // $cover = $request->cover;
        $cover = $request->file('file');

        $hasCover = $request->hasFile('file');

        if($hasCover){
            $path = $request->file->store();
            Comics::create([
            'comics_title' => $request->title,
            'comics_description' => $request->description,
            'comics_cover_image_path' => "./image/" . $path,
            'user_id' => Auth::user()->id,
            'published_at' => Carbon::now()
            ]);
        }
        else {
            Comics::create([
            'comics_title' => $request->title,
            'comics_description' => $request->description,
            'comics_cover_image_path' => "./image/cover_image_sample2.jpg",
            'user_id' => Auth::user()->id,
            'published_at' => Carbon::now()
            ]);
        }
        $last_comics = Auth::user()->comics->first();
        $comics_id = $last_comics->id;
        $genres = $request->genre;
        for($i = 0; $i < strlen($genres); $i++){
            GenresToComics::create([
                'comics_id' => $comics_id,
                'genre_id' => $genres[$i]
            ]);
        }

        if($hasCover){
            Chapter::create(['title' => '0', 'description' => 'zero chapter', 'comics_id' => $comics_id]);
            Page::create(['description' => 'Cover of '.$last_comics->name, 
            'image_path' => $last_comics->comics_cover_image_path,
            'chapter_id' => $last_comics->chapters->first()->id]);
        }
        else{
            Chapter::create(['title' => '0', 'description' => 'zero chapter', 'comics_id' => $comics_id]);
            Page::create(['description' => 'Cover of '.$last_comics->name, 
            'image_path' => "./image/cover_image_sample2.jpg",
            'chapter_id' => $last_comics->chapters->first()->id]);
        }

        return redirect('mastery');
            // if($request->file('file')->isValid()){
            //     return "OK";
            // }
        // // $path = $request->cover->store('images');
        // return redirect('/comics'{$comics_id})
    }
}
