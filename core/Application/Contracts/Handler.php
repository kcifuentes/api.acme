<?php

namespace Acme\Application\Contracts;

use Acme\Domain\BaseEntity;

interface Handler
{
    public function __invoke(Command $command): BaseEntity|array;
}
