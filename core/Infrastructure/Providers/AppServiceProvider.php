<?php

namespace Acme\Infrastructure\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Acme\Application\Bus\Contracts\Container;
use Acme\Infrastructure\Bus\Contracts\CommandBus;
use Acme\Infrastructure\Bus\GestihumContainer;
use Acme\Infrastructure\Bus\SimpleCommandBus;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->app->bind(CommandBus::class, SimpleCommandBus::class);
        $this->app->bind(Container::class, GestihumContainer::class);
    }

    public function boot(): void
    {
    }
}
