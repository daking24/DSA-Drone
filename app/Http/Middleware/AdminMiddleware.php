<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // dd(auth()->user()->roles->contains('name', $role),$role,  auth()->user()->roles->contains('name', 'admin'));
        if (!auth()->check() || !auth()->user()->roles->contains('name', $role)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
