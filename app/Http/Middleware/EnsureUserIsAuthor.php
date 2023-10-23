<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Comics;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $single_comics = Comics::find($id);

        if(Auth::user()->id != $single_comics->user->id){
            return redirect('/');
        }
        return $next($request);
    }
}
