<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class LogoutServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('App\Repositories\Logout\LogoutContract',
            'App\Repositories\Logout\EloquentLogoutRepository');
    }
}
