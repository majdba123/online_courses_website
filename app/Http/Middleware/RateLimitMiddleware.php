<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        $limit = 50; // Requests per minute
        $decayMinutes = 1; // Reset in 1 minute
        $key = $request->user()
            ? $request->user()->id . ':' . $request->ip()
            : $request->ip();
        $maxAttempts = RateLimiter::attempts($key);
        if ($maxAttempts >= $limit) {
            abort(429);
        }
        RateLimiter::hit($key, $decayMinutes * 60);
        return $next($request);
    }
}
