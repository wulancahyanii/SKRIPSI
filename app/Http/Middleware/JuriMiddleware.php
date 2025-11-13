<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuriMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan memiliki role juri
        if (Auth::check() && Auth::user()->role === 'juri') {
            return $next($request);
        }

        // Jika tidak sesuai, arahkan kembali ke halaman login
        return redirect()->route('login')->withErrors('Akses hanya untuk juri.');
    }
}
