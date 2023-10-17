<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $comics = Comics::where('user_id', Auth::user()->id)->get();

        return view('dashboard')->with('comics', $comics);
    }
}
