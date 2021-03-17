<?php

namespace Tests\Unit\Application\Services\Auth;

use Acme\Application\Services\Auth\LoginCommand;
use Illuminate\Validation\UnauthorizedException;
use Tests\TestCase;

class LoginCommandTest extends TestCase
{
    /** @test */
    public function shouldBeReturnUnauthorizedError(): void
    {
        $this->expectException(UnauthorizedException::class);

        $command = new LoginCommand('user@user.com', '12345678');
        $this->commandBus->execute($command);
    }

    /** @test */
    public function shouldBeReturnUnauthorizedErrorForPasswordIncorrect(): void
    {
        $this->expectException(UnauthorizedException::class);

        $this->registerUser(
            name: 'User',
            email: "user@user.com",
            password: "123456789"
        );

        $command = new LoginCommand('user@user.com', '12345678dfdfsdfwef');
        $this->commandBus->execute($command);
    }
}
