<?php

namespace Tests;

use Acme\Application\Services\Auth\RegisterUserCommand;
use Acme\Domain\User\UserEntity;
use Acme\Infrastructure\Bus\Contracts\CommandBus;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected CommandBus $commandBus;
    private string $basePath;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');

        try {
            $this->commandBus = $this->app->make(CommandBus::class);
            $this->basePath = public_path();
        } catch (BindingResolutionException $e) {
        }
    }

    protected function getBasePath(): string
    {
        return $this->basePath;
    }

    public function registerUser(
        string $name = null,
        string $email = null,
        string $password = null,
    ): UserEntity
    {
        $command = new RegisterUserCommand(
            name: $name,
            email: $email,
            password: $password
        );

        return $this->commandBus->execute($command);
    }
}
