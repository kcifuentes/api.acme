<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Console;

use Acme\Infrastructure\Console\Commands\ControllerMakeCommand;
use Acme\Infrastructure\Console\Commands\MakeCommand;
use Acme\Infrastructure\Console\Commands\ModelMakeCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        MakeCommand::class,
        ModelMakeCommand::class,
        ControllerMakeCommand::class
    ];

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
