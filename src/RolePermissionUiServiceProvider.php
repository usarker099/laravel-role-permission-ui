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
        $this->publishes([
            __DIR__.'/../routes/ui.php' => base_path('routes/role-permission-ui.php'),
        ], 'role-permission-ui-routes');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'role-permission-ui');

        $this->publishes([
            __DIR__.'/../resources/views/bootstrap' => resource_path('views/bootstrap'),
        ], 'role-permission-ui-views-bootstrap');
        $this->publishes([
            __DIR__.'/../resources/views/tailwind' => resource_path('views/tailwind'),
        ], 'role-permission-ui-views-tailwind');
        $this->publishes([
            __DIR__.'/../resources/js/Pages' => resource_path('js/Pages'),
        ], 'role-permission-ui-views-pages');

        $this->publishes([
            __DIR__.'/../public/bootstrap' => public_path('bootstrap'),
        ],'role-permission-ui-assets-bootstrap');
        $this->publishes([
            __DIR__.'/../public/tailwind' => public_path('tailwind'),
        ], 'role-permission-ui-assets-tailwind');
        $this->publishes([
            __DIR__.'/../public/inertia' => public_path('inertia'),
        ], 'role-permission-ui-assets-inertia');

        $this->publishes([
            __DIR__.'/../resources/views/inertia-ui.blade.php' => resource_path('views/vendor/role-permission-ui/inertia/index.blade.php'),
        ], 'role-permission-ui-views-inertia');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/role-permission-ui.php' => config_path('role-permission-ui.php'),
            ], 'role-permission-ui-config');
        }
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}