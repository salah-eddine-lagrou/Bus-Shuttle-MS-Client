<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Add your middleware logic here
        // For example, check if the user is a client
        if (!auth()->user()) {
            return redirect()->route('loginC')->with('message', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}