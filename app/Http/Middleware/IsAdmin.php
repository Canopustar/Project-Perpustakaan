<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /** 
     *	Handle an incoming request. 
     * 
     *	@param  \Closure(\Illuminate\Http\Request): 
(\Symfony\Component\HttpFoundation\Response)  $next */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Periksa apakah user sudah login DAN memiliki role_id = 1 (Admin)
        if (Auth::check() && Auth::user()->role_id == '1') {
            return $next($request); // Loloskan ke halaman yang dituju
        }

        // 2. Jika bukan admin, tendang kembali ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Akses ditolak. Anda bukan Admin.');
    }
}
