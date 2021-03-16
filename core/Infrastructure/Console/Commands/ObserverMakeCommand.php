<?php

namespace Acme\Infrastructure\Console\Commands;

use Illuminate\Foundation\Console\ObserverMakeCommand as Command;

class ObserverMakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Infrastructure\Eloquent\Observers";
    }
}
