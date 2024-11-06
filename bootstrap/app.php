<?php

use App\Helpers\ResponseHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('api/web-app')->middleware('api')->group(base_path('routes/api/web-app.php'));
            Route::prefix('api/mobile')->middleware('api')->group(base_path('routes/api/mobile.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $e, Request $request) {
            if ($request->is('api/*')) {
                if ($e instanceof ValidationException) {
                    // Send default response
                } else if ($e instanceof UnauthorizedException) {
                    return ResponseHelper::unauthorized($e->getMessage());
                } else if ($e instanceof ModelNotFoundException) {
                    return ResponseHelper::notFound($e->getMessage());
                } else {
                    return ResponseHelper::internalServerError($e->getMessage());
                }
            }
        });
    })->create();
