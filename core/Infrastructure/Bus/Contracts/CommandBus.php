<?php


namespace Acme\Infrastructure\Bus\Contracts;


use Acme\Application\Contracts\Command;
use Acme\Domain\BaseEntity;

interface CommandBus
{
    public function execute(Command $command): BaseEntity|array;
}
