<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // for guru
        Gate::define('admin', function (User $user) {
            return $user->role_id == 1;
        });

        Gate::define('guru', function (User $user) {
            return $user->role_id == 2;
        });

        Gate::define('siswa', function (User $user) {
            return $user->role_id == 3;
        });
    }
}
