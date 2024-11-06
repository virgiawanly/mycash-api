<?php

namespace App\Providers;

use App\Repositories\BusinessRepository;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegistrationService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BusinessRepositoryInterface::class, BusinessRepository::class);

        $this->app->bind(LoginService::class, function ($app) {
            return new LoginService($app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(RegistrationService::class, function ($app) {
            return new RegistrationService(
                $app->make(BusinessRepositoryInterface::class),
                $app->make(UserRepositoryInterface::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
