<?php

namespace Acme\Infrastructure\Console\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as Command;

class MakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Infrastructure\Console\Commands";
    }
}
