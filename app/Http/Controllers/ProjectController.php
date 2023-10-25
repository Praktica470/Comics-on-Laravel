<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Comics;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index ($id) {

        $single_comics = Comics::find($id);
        return view('project')->with('single_comics', $single_comics);
    
    }

    public function toPage ($id, $ch) {
        return view('page_create')->with([
            'ch' => $ch,
            'id' => $id
        ]);
    }

    public function storeChapter($id, Request $request) {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);

        $chapter = Chapter::create([
            'title' => $request->title,
            'description' => $request->description,
            'comics_id' => $id
        ]);

        return redirect()->route('project', [$id]);
    }

    //    public function storeChapter($id, Request $request): RedirectResponse {

    //     $request->validate([
    //         'title' => ['required', 'string', 'max:255'],
    //         'description' => ['required', 'string']
    //     ]);

    //     Chapter::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'comics_id' => $id
    //     ]);

    //     return redirect()->route('project', [$id]);
    // }

    public function storePage($id, $ch, Request $request): RedirectResponse {

        if(Auth::user()->comics->find($id)->chapters->find($ch) != null){
            if($request->hasFile('file')){
                $path = $request->file->store();
                $pages = Page::create([
                    'description' => $request->description,
                    'image_path' => './image/'. $path,
                    'chapter_id' => $ch
                ]);
            }
        }

        return redirect()->route('project', [$id]);
    }
}
