<?php

namespace Christhompsontldr\LaravelRestricted;

use Christhompsontldr\LaravelRestricted\Http\Middleware\Restricted;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Support\Facades\Gate;

class ServiceProvider extends IlluminateServiceProvider
{

    public function boot() {
        $this->publishes([
            dirname(__DIR__) . '/config/restricted.php' => config_path('restricted.php'),
        ]);

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/restricted.php', 'restricted'
        );

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app['router']->pushMiddlewareToGroup('web', Restricted::class);

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'restricted');

        // user is not in restricted mode
        Gate::define('unrestricted', function () {
            return !session('laravel-restricted.enabled', false);
        });

        // user is in restricted mode
        Gate::define('restricted', function () {
            return session('laravel-restricted.enabled', false);
        });
    }
}
