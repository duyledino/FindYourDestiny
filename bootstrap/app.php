<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            //if routes/admin.php has already declare then I don't need to declare here anymore.
            // else I need to link twice like this http://127.0.0.1:8000/admin/admin/dashboard  
            Route::middleware( 'web') // Use 'web' so sessions/auth work/
                ->group(base_path('/routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->redirectTo('login')->alias(['admin' => EnsureUserIsAdmin::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
