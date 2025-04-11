<?php

namespace App\Providers;

use App\Repositories\Contracts\CarRepositoryInterface;
use App\Repositories\Contracts\ConfigurationOptionRepositoryInterface;
use App\Repositories\Contracts\ConfigurationRepositoryInterface;
use App\Repositories\Contracts\OptionRepositoryInterface;
use App\Repositories\Contracts\PriceRepositoryInterface;
use App\Repositories\Eloquent\CarRepository;
use App\Repositories\Eloquent\ConfigurationOptionRepository;
use App\Repositories\Eloquent\ConfigurationRepository;
use App\Repositories\Eloquent\OptionRepository;
use App\Repositories\Eloquent\PriceRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
        $this->app->bind(OptionRepositoryInterface::class, OptionRepository::class);
        $this->app->bind(ConfigurationRepositoryInterface::class, ConfigurationRepository::class);
        $this->app->bind(ConfigurationOptionRepositoryInterface::class, ConfigurationOptionRepository::class);
        $this->app->bind(PriceRepositoryInterface::class, PriceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
