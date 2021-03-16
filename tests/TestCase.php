<?php

namespace Tests;

use Acme\Application\Services\Auth\RegisterUserCommand;
use Acme\Domain\Auth\AuthEntity;
use Acme\Domain\BaseEntity;
use Acme\Infrastructure\Bus\Contracts\CommandBus;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\TestResponse;

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

    public function registerUser(): array|BaseEntity|AuthEntity
    {
        $command = new RegisterUserCommand(
            'user',
            'user@user.com',
            '123456',
        );

        /** @var AuthEntity $response */
        return $this->commandBus->execute($command);
    }

    public function registerUserHttp(
        string $name = null,
        string $email = null,
        string $password = null,
    ): TestResponse
    {
        $data = [];

        if ($name) {
            $data['name'] = $name;
        }

        if ($email) {
            $data['email'] = $email;
        }

        if ($password) {
            $data['password'] = $password;
        }

        return $this->postJson(route('auth.register'), $data);
    }
}
