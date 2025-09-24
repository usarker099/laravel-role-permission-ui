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
        
        $choice = $this->choice(
            'Which UI framework would you like to install?',
            ['tailwind', 'bootstrap', 'inertia-react'],
            0
        );

        $this->info("You chose to install the {$choice} UI components.");

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
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-views-inertia-react', '--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'role-permission-ui-assets-inertia-react', '--force' => true]);
        }

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
}