<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MiddlewareSiswa
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // CEK APAKAH SISWA SUDAH LOGIN
        if (!Auth::guard('siswa')->check()) {

            // arahkan ke login siswa
            return redirect('/loginsiswa');
        }

        return $next($request);
    }
}