<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $comics = Auth::user()->comics;

        return view('dashboard')->with('comics', $comics);
    }
}
