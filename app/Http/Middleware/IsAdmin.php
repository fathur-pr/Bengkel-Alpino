<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        // aman walau kolom belum ada
        if (!isset(Auth::user()->is_admin) || Auth::user()->is_admin != 1) {
            Auth::logout();
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
