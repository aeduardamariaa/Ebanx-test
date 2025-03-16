<?php

namespace App\Providers;

use App\Services\AccountService;
use App\Services\Contracts\AccountServiceInterface;
use App\Services\Contracts\ResetServiceInterface;
use App\Services\Contracts\TransactionServiceInterface;
use App\Services\ResetService;
use App\Services\TransactionService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AccountServiceInterface::class, AccountService::class);
        $this->app->singleton(TransactionServiceInterface::class, TransactionService::class);
        $this->app->singleton(ResetServiceInterface::class, ResetService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
