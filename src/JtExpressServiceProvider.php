<?php

namespace Gouda\JtExpressLaravel;


use Illuminate\Support\ServiceProvider;

class JtExpressServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../config/JtExpress.php' => config_path('JtExpress.php'),
        ], 'JtExpress-package-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/JtExpress.php', 'JtExpress');
    }

}