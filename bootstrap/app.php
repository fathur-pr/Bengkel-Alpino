<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(\App\Http\Middleware\TrackVisitor::class);
    // Middleware global (jalan di semua halaman)
    $middleware->append(\App\Http\Middleware\TrackVisitor::class);

    // Middleware alias (dipakai di route)
    $middleware->alias([
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
    ]);

})

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();