<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then : function(){
            Route::middleware(['web','auth'])
                ->prefix('user-panel')
                ->name('user-panel.')
                ->group(base_path('routes/user-panel/user-panel.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'Alert' =>  \RealRashid\SweetAlert\Facades\Alert::class,
            'Melipayamak' => Melipayamak\Laravel\Facade::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
