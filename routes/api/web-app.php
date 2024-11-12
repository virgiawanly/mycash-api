<?php

use App\Http\Controllers\WebApp\Auth\LoginController;
use App\Http\Controllers\WebApp\Auth\RegistrationController;
use App\Http\Controllers\WebApp\Business\BusinessEntityController;
use App\Http\Controllers\WebApp\Business\BusinessLocationController;
use App\Http\Controllers\WebApp\Contact\ContactController;
use App\Http\Controllers\WebApp\Contact\ContactGroupController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegistrationController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('business-entities/batch-delete', [BusinessEntityController::class, 'batchDelete']);
    Route::apiResource('business-entities', BusinessEntityController::class);
    Route::delete('business-locations/batch-delete', [BusinessLocationController::class, 'batchDelete']);
    Route::apiResource('business-locations', BusinessLocationController::class);

    Route::apiResource('contact-groups', ContactGroupController::class);
    Route::apiResource('contacts', ContactController::class);
});
