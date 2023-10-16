<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;

class WelcomePageController extends Controller
{
    public function index() 
    {
        $comics = Comics::all();
        
        return view('welcome')->with('comics', $comics);
    }
}
