<?php

namespace Destiny;

use Illuminate\Support\ServiceProvider;

class DestinyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'destiny');
    }

    public function register()
    {
        # code...
    }
}