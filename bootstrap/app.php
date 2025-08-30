<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'auth'])
                ->prefix('user')
                ->name('user.')
                ->group(base_path('routes/user/user.php'));
            Route::middleware(['web', 'auth','admin.auth'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin/admin.php'));

        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'Alert' => \RealRashid\SweetAlert\Facades\Alert::class,
            'Melipayamak' => Melipayamak\Laravel\Facade::class,
            'admin.auth' => \App\Http\Middleware\AdminAuthenticateMiddleware::class,
        ]);
    })
    ->withCommands([
        \App\Console\Commands\SmsQueueRun::class,


    ])
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
