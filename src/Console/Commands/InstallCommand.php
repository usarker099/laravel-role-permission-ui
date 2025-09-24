<?php

namespace sarker\RolePermissionUi\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'role-permission-ui:install';
    protected $description = 'Install the role and permission UI components for Bootstrap, Tailwind, or Inertia.';

    public function handle(): int
    {
        $this->call('vendor:publish', ['--tag' => 'role-permission-ui-config', '--force' => true]);
        $this->addRoute();



        $choice = $this->choice(
            'Which UI framework would you like to install?',
            ['tailwind', 'bootstrap', 'inertia-react'],
            0
        );

        $this->info("You chose to install the {$choice} UI components.");

        // Publish all views and assets with their new consolidated tags
        if ($choice === 'tailwind') {
            $this->comment('Publishing Tailwind UI assets...');
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-views-tailwind', '--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-assets-tailwind', '--force' => true]);
        } elseif ($choice === 'bootstrap') {
            $this->comment('Publishing Bootstrap UI assets...');
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-views-bootstrap', '--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-assets-bootstrap', '--force' => true]);
        } elseif ($choice === 'inertia-react') {
            $this->comment('Publishing Inertia+React UI assets...');
    
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-views-inertia', '--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-assets-inertia', '--force' => true]);
        }

        // Write the choice to the config file
        $this->writeConfig($choice);

        $this->info("\nInstallation complete. Your UI components are ready!");

        return Command::SUCCESS;
    }

    private function writeConfig(string $ui): void
    {
        $configPath = config_path('role-permission-ui.php');
        $content = File::get($configPath);
        $content = preg_replace("/'ui' => '.*?'/", "'ui' => '{$ui}'", $content);
        File::put($configPath, $content);
    }

    protected function addRoute(): void
{
    $routeFilePath = base_path('routes/web.php');

    // The line to add
    $routeLine = "Route::group(['middleware' => ['web']], function () { require base_path('routes/role-permission-ui.php'); });";

    // Read the current content of the routes file
    $contents = File::get($routeFilePath);

    // Check if the route is already there to prevent duplicates
    if (! str_contains($contents, 'role-permission-ui.php')) {
        File::append($routeFilePath, "\n\n".$routeLine);
        $this->info('Routes added to routes/web.php.');
    } else {
        $this->comment('Routes already exist in routes/web.php.');
    }
}

}