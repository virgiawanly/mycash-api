<?php

use App\Http\Controllers\WebApp\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [RegistrationController::class, 'register']);
});
