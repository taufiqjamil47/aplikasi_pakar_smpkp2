<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::defaultView('pagination::tailwind');
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 1;
        });

        Gate::define('isStaff', function (User $user) {
            return $user->role === 2;
        });

        Gate::define('isKepsek', function (User $user) {
            return $user->role === 3;
        });

        Gate::define('isWakasek', function (User $user) {
            return $user->role === 4;
        });

        Gate::define('isPiket', function (User $user) {
            return $user->role === 5;
        });


        // if (app()->environment('local')) {
        //     URL::forceScheme('https');
        // }
    }
}
