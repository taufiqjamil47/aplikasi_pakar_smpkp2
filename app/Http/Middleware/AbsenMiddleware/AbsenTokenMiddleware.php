<?php

namespace App\Http\Middleware\AbsenMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AbsenTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('absen_token_verified')) {
            return redirect()->route('absen.token-form')->with('error', 'Silakan masukkan token terlebih dahulu.');
        }
        return $next($request);
    }
}
