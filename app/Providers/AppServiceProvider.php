<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\PaginationState;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Gate::define('Admin', function (User $user) {
            return $user->admin;
        });
    }
}
