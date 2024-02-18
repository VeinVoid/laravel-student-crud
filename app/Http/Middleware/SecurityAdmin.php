<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('dashboard.home')->with('error', 'You need to login first.');
        }

        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard.home')->with('error', 'You does`t have authorisazion.');
        }

        return $next($request);
    }
}
