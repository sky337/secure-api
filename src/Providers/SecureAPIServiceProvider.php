<?php

namespace Sky337\SecureAPI\Providers;

use Illuminate\Support\ServiceProvider;
use Sky337\SecureAPI\Http\Middleware\RoleMiddleware;
use Illuminate\Routing\Router;

class SecureAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/secure-api.php', 'secure-api');
    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/../../config/secure-api.php' => config_path('secure-api.php'),
        ], 'secure-api-config');

        // Publish migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'secure-api-migrations');

        // Register Middleware
        $router->aliasMiddleware('role', RoleMiddleware::class);
    }
}
