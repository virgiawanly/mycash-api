<?php

use App\Http\Controllers\WebApp\Auth\LoginController;
use App\Http\Controllers\WebApp\Auth\RegistrationController;
use App\Http\Controllers\WebApp\Business\BusinessEntityController;
use App\Http\Controllers\WebApp\Contact\ContactController;
use App\Http\Controllers\WebApp\Contact\ContactGroupController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegistrationController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('business-entities', BusinessEntityController::class);

    Route::apiResource('contact-groups', ContactGroupController::class);
    Route::apiResource('contacts', ContactController::class);
});
