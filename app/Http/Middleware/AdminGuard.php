<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminGuard {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (!Auth::check()) {
            return abort(401);
        }
        if (Auth::user()->role == 'admin') {
            return $next($request);
        }
        if (Auth::user()->role == 'client') {
            return redirect()->route('client.home');
        }
        if (Auth::user()->role == 'personnel') {
            return redirect()->route('personnel.home');
        }
    }

}
