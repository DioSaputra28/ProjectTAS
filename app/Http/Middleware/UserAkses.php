<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $status)
    {
        if (auth()->user()->status == $status) {
            return $next($request);
        }

        return response()->json(['message' => 'Anda tidak bisa mengakses halaman ini.'], 403);
    }
}
