<?php

namespace Acme\Domain\Traits;

trait Validation
{
    protected function assertExists($value): bool
    {
        return !empty($value);
    }
}
