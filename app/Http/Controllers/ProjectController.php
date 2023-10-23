<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;

class ProjectController extends Controller
{
    public function index ($id) {

        $single_comics = Comics::find($id);
        return view('project')->with('single_comics', $single_comics);
    
    }
}
