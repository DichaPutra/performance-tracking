<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientGuard {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (!auth()->user()->role) {
            return abort(404);
        }elseif (auth()->user()->role == 'client') {
            return $next($request);
        } elseif (auth()->user()->role == 'admin') {
            return redirect()->route('admin.home');
        }
        return abort(401);
    }

}
