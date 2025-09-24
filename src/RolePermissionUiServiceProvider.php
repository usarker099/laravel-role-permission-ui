<?php

namespace sarker\RolePermissionUi;

use Illuminate\Support\ServiceProvider;
use sarker\RolePermissionUi\Console\Commands\InstallCommand;

class RolePermissionUiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'role-permission-ui');

        $this->publishes([
            __DIR__.'/../resources/views/bootstrap' => resource_path('views/vendor/role-permission-ui/bootstrap'),
            __DIR__.'/../resources/views/tailwind' => resource_path('views/vendor/role-permission-ui/tailwind'),
            __DIR__.'/../resources/views/inertia' => resource_path('views/vendor/role-permission-ui/inertia'),
        ], 'role-permission-ui-views');

        $this->publishes([
            __DIR__.'/../public/bootstrap' => public_path('vendor/role-permission-ui/bootstrap'),
            __DIR__.'/../public/tailwind' => public_path('vendor/role-permission-ui/tailwind'),
            __DIR__.'/../public/inertia' => public_path('vendor/role-permission-ui/inertia'),
        ], 'role-permission-ui-assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}