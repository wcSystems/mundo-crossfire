<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleUser
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
        // Not Logged
        if (!Auth::check()) {
            return redirect('/login');
        }
        if ($request->user()->role_id == 3) {
            return redirect('/shop');
        }
        return $next($request);
    }
}
