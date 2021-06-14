<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasProfile
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

        if(!Auth::user()->profile) {
            return redirect()->route('profile.add')
                ->with('warning','Please complete your profile to proceed. Thank you!');
        }

        return $next($request);
    }
}
