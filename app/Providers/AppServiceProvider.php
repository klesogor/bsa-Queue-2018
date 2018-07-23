<?php

namespace App\Providers;

use App\Entity\Currency;
use App\Events\CurrencyObserver;
use App\Services\CurrencyNotificationService;
use App\Services\CurrencyNotificationServiceInterface;
use App\Services\CurrencyRepository;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyService;
use App\Services\CurrencyServiceInterface;
use App\Services\UserRepository;
use App\Services\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //Currency::observe(CurrencyObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyNotificationServiceInterface::class,
                CurrencyNotificationService::class);
        $this->app->singleton(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CurrencyServiceInterface::class,CurrencyService::class);
    }
}
