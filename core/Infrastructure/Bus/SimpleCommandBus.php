<?php


namespace Acme\Infrastructure\Bus;


use Acme\Application\Bus\Contracts\Container;
use Acme\Application\Contracts\Command;
use Acme\Domain\BaseEntity;
use Acme\Infrastructure\Bus\Contracts\CommandBus;

class SimpleCommandBus implements CommandBus
{
    private const COMMAND_PREFIX = 'Command';
    private const HANDLER_PREFIX = 'Handler';

    public function __construct(private Container $container)
    {
    }

    public function execute(Command $command): BaseEntity|array
    {
        return $this->resolveHandler($command)->__invoke($command);
    }

    private function resolveHandler(Command $command): object
    {
        return $this->container->make($this->getHandlerClass($command));
    }

    private function getHandlerClass(Command $command): string
    {
        return str_replace(
            self::COMMAND_PREFIX,
            self::HANDLER_PREFIX,
            get_class($command)
        );
    }
}
