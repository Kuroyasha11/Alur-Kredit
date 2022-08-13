<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('analis', function (User $user) {
            return $user->is_analis;
        });

        Gate::define('komite1', function (User $user) {
            return $user->is_komite1;
        });

        Gate::define('komite2', function (User $user) {
            return $user->is_komite2;
        });

        Gate::define('marketing', function (User $user) {
            return $user->is_marketing;
        });

        Blade::directive('IDR', function ($rupiah) {
            return "Rp<?php echo number_format($rupiah, 0); ?>";
        });
    }
}
