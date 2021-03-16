<?php

namespace Acme\Domain\Traits;

use JetBrains\PhpStorm\Pure;

trait Validation
{
    protected function assertExists($value): bool
    {
        return !empty($value);
    }
}
