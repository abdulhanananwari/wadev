<?php

namespace Wadev\Site;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class WadevSiteProvider extends ServiceProvider {

    public function boot(Router $router) {

        require __DIR__ . '/Http/routes.php';
        
        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'wadev.site');
        $this->loadViewsFrom(__DIR__ . '/Resources/Emails', 'wadev.site.emails');
        
        $this->publishes([
            __DIR__.'/Database/Migrations/' => database_path('migrations/wadev/site')
        ], 'migrations');
        
    }

    public function register() {

        $this->mergeConfigFrom(__DIR__ . '/Config/tenant_types.php', 'wadev.site.tenant_types');
    }

}
