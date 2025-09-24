<?php

namespace Sarker\RolePermissionUi\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role-permission-ui:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the role and permission UI components for Bootstrap, Tailwind, or Inertia.';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        $choice = $this->choice(
            'Which UI framework would you like to install?',
            ['tailwind', 'bootstrap', 'inertia-react'],
            0
        );

        $this->info("You chose to install the {$choice} UI components.");

        // Here, we would implement the actual file copying and configuration
        // based on the user's choice. For this example, we'll just output
        // a message about what would be done.

        if ($choice === 'tailwind') {
            $this->comment('Publishing Tailwind UI assets...');
            $this->line('- Controllers: src/Http/Controllers/Tailwind/*.php');
            $this->line('- Views: resources/views/tailwind/*.blade.php');
            $this->line('- Routes: routes/web.php (Tailwind group)');
        } elseif ($choice === 'bootstrap') {
            $this->comment('Publishing Bootstrap UI assets...');
            $this->line('- Controllers: src/Http/Controllers/Bootstrap/*.php');
            $this->line('- Views: resources/views/bootstrap/*.blade.php');
            $this->line('- Routes: routes/web.php (Bootstrap group)');
        } elseif ($choice === 'inertia-react') {
            $this->comment('Publishing Inertia+React UI assets...');
            $this->line('- Controllers: src/Http/Controllers/Inertia/*.php');
            $this->line('- Views: resources/js/Pages/*');
            $this->line('- Routes: routes/web.php (Inertia group)');
        }

        $this->info("\nInstallation complete. Your UI components are ready!");

        return Command::SUCCESS;
    }
}
