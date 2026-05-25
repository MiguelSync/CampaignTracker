<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->group(base_path('routes/web/user.php'));
            Route::middleware('web')->group(base_path('routes/web/profile.php'));
            Route::middleware('web')->group(base_path('routes/web/campaign.php'));
            Route::middleware('web')->group(base_path('routes/web/campaign_user.php'));
            Route::middleware('web')->group(base_path('routes/web/game.php'));
            Route::middleware('web')->group(base_path('routes/web/connection.php'));
            Route::middleware('web')->group(base_path('routes/web/user_connection.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(function () {
                    Route::group([], base_path('routes/api/user.php'));
                    Route::group([], base_path('routes/api/campaign.php'));
                    Route::group([], base_path('routes/api/campaign_user.php'));
                    Route::group([], base_path('routes/api/game.php'));
                    Route::group([], base_path('routes/api/connection.php'));
                    Route::group([], base_path('routes/api/user_connection.php'));
                });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
