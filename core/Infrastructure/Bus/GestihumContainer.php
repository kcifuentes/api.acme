<?php /** @noinspection PhpUnhandledExceptionInspection */


namespace Acme\Infrastructure\Bus;

use Illuminate\Container\Container as IoC;
use Illuminate\Contracts\Container\BindingResolutionException;
use Acme\Application\Bus\Contracts\Container;

final class GestihumContainer implements Container
{
    public function __construct(private IoC $container)
    {
    }

    public function make($class): object
    {
        return $this->container->make($class);
    }
}
