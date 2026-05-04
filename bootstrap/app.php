<?php

<<<<<<< HEAD
=======
use App\Http\Middleware\isAdministrator;
use App\Http\Middleware\isAnyAdmin;
use App\Http\Middleware\isVendorAdmin;
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
<<<<<<< HEAD
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // ← Exclude webhook Midtrans dari CSRF
        $middleware->validateCsrfTokens(except: [
            'midtrans/webhook',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
=======
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'isAdministrator' => isAdministrator::class,
            'isVendorAdmin' => isVendorAdmin::class,
            'isAnyAdmin' => isAnyAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
