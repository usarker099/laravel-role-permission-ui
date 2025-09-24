<?php

namespace sarker\RolePermissionUi;

use Illuminate\Support\ServiceProvider;
use sarker\RolePermissionUi\Console\Commands\InstallCommand;

class RolePermissionUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load the routes for the package.
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load the views from the package's resources directory.
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'role-permission-ui');

        // Define publishing groups for each theme's views.
        $this->publishes([
            __DIR__.'/../resources/views/bootstrap' => resource_path('views/vendor/role-permission-ui/bootstrap'),
        ], 'role-permission-ui-views-bootstrap');

        $this->publishes([
            __DIR__.'/../resources/views/tailwind' => resource_path('views/vendor/role-permission-ui/tailwind'),
        ], 'role-permission-ui-views-tailwind');

        // Define publishing groups for each theme's assets.
        $this->publishes([
            __DIR__.'/../public/bootstrap' => public_path('vendor/role-permission-ui/bootstrap'),
        ], 'role-permission-ui-assets-bootstrap');

        $this->publishes([
            __DIR__.'/../public/tailwind' => public_path('vendor/role-permission-ui/tailwind'),
        ], 'role-permission-ui-assets-tailwind');

        // Register the Artisan command if running in the console.
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
