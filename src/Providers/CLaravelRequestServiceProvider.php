<?php

namespace csi0n\Laravel\Request\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('crulemethod', function ($expression) {
            return sprintf('<input type="hidden" name="c_rule_method" value=%s />', $expression);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('csi0n.laravel.request', function () {
            return new \csi0n\Laravel\Request\Repositories\CLaravelRequestRepository();
        });
    }
}
