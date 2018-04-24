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
            __DIR__ . '/../config/admin.php' => config_path('admin.php')
        ], 'admin');
        $this->publishes([
            __DIR__.'/Http/Controllers' => base_path('app/Http/Controllers')
        ], 'controllers');

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->make('Angeli\Admin\ProductController');
        $this->app->bind('admin', function($app){
            return new Admin($app);
        });

        $this->app->alias("admin", "Angeli\Admin\Admin");
    }
}