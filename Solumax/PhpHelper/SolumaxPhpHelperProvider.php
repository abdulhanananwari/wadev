<?php

namespace Solumax\PhpHelper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class SolumaxPhpHelperProvider extends ServiceProvider {

    public function boot(Router $router) {

        require __DIR__ . '/Http/routes.php';
        
        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'solumax.phpHelper');
        
        if (method_exists($router, 'aliasMiddleware')) {

            $router->aliasMiddleware('mongoDbLogger', Http\Middlewares\MongoDbLogger::class);

        } else {

            $router->middleware('mongoDbLogger', Http\Middlewares\MongoDbLogger::class);
        }
    }

    public function register() {

        $this->app->singleton('SolPhpHelper', function () {
            return new Facade\SolPhpHelper();
        });
        
        

        $this->commands([
            Console\Angular\Reset::class,
        ]);
    }

}
