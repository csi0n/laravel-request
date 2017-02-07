<?php

namespace csi0n\Laravel\Request\Providers;

use Illuminate\Support\ServiceProvider;

class CLaravelRequestServiceProvider extends ServiceProvider
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
        $this->app->singleton('csi0n.laravel.request', function () {
            return new \App\Repositories\CLaravelRequestRepository();
        });
    }
}
