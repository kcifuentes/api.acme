<?php

namespace Acme\Infrastructure\Console\Commands;


use Illuminate\Routing\Console\ControllerMakeCommand as Command;

class ControllerMakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Infrastructure\Http\Controllers";
    }
}
