<?php

namespace Angeli\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    protected $defer = false;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if(!$this->app->routesAreCached()){
            require __DIR__.'/routes.php';
    }
        $this->loadViewsFrom(base_path('resources/views'), 'admin');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views')
        ]);
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/../config/angeli.php' => config_path('angeli.php')
        ], 'angeli');
        $this->publishes([
            __DIR__.'/controllers' => base_path('/app/Http/Controllers')
        ], 'controllers');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('admin', function($app){
            return new Admin($app);
        });
    }
}