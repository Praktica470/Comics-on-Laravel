<?php

namespace App\Http\Controllers;

use App\Models\Comics;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CreatedComicsController extends Controller
{
    public function index() {

        return view('createtool');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);

        // $cover = $request->cover;
        $cover = $request->file('file');

        if($cover->isValid()){
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
            // if($request->file('file')->isValid()){
            //     return "OK";
            // }
        // // $path = $request->cover->store('images');
        // return redirect('/comics'{$comics_id})
    }
}
