<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PersonilGuard {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == 'personil')
        {
            return $next($request);
        }

        return back();
    }

}
