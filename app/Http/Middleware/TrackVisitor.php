<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // 🔕 Visitor tracking dinonaktifkan sementara
        return $next($request);
    }
}
