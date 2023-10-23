<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Comics;

class MasterController extends Controller
{
    public function index () {
        
        $comics = Auth::user()->comics;

        return view('master')->with('comics', $comics);
    }
}
