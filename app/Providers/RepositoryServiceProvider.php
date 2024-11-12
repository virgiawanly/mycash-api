<?php

namespace App\Providers;

use App\Repositories\BusinessEntityRepository;
use App\Repositories\BusinessLocationRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\ChartOfAccountRepository;
use App\Repositories\ContactGroupRepository;
use App\Repositories\ContactRepository;
use App\Repositories\Interfaces\BusinessEntityRepositoryInterface;
use App\Repositories\Interfaces\BusinessLocationRepositoryInterface;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Repositories\Interfaces\ChartOfAccountRepositoryInterface;
use App\Repositories\Interfaces\ContactGroupRepositoryInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegistrationService;
use App\Services\Business\BusinessEntityService;
use App\Services\Business\BusinessLocationService;
use App\Services\ChartOfAccount\ChartOfAccountService;
use App\Services\Contact\ContactGroupService;
use App\Services\Contact\ContactService;
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

        $this->app->bind(BusinessEntityRepositoryInterface::class, BusinessEntityRepository::class);
        $this->app->bind(BusinessEntityService::class, function ($app) {
            return new BusinessEntityService($app->make(BusinessEntityRepositoryInterface::class));
        });

        $this->app->bind(BusinessLocationRepositoryInterface::class, BusinessLocationRepository::class);
        $this->app->bind(BusinessLocationService::class, function ($app) {
            return new BusinessLocationService($app->make(BusinessLocationRepositoryInterface::class));
        });

        $this->app->bind(ContactGroupRepositoryInterface::class, ContactGroupRepository::class);
        $this->app->bind(ContactGroupService::class, function ($app) {
            return new ContactGroupService($app->make(ContactGroupRepositoryInterface::class));
        });

        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ContactService::class, function ($app) {
            return new ContactService($app->make(ContactRepositoryInterface::class));
        });

        $this->app->bind(ChartOfAccountRepositoryInterface::class, ChartOfAccountRepository::class);
        $this->app->bind(ChartOfAccountService::class, function ($app) {
            return new ChartOfAccountService($app->make(ChartOfAccountRepositoryInterface::class));
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
