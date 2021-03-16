<?php

namespace Acme\Infrastructure\Console\Commands;


use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Infrastructure\Eloquent\Models";
    }
}
