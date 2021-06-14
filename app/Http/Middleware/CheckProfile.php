<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        if(Auth::user()->profile) {
            return redirect()->route('profile.view', ['role' => Auth::user()->role->name, 'user_id' => Auth::user()->id]);
        }
        
        return $next($request);
    }
}
