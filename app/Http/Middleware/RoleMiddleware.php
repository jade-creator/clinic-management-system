<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = is_array($role) ? $role : explode('|', $role);

        if(!in_array(Auth::user()->role->name, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
