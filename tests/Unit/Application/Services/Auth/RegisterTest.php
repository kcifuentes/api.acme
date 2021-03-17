<?php

namespace Tests\Unit\Application\Services\Auth;

use Acme\Domain\User\UserEntity;
use Exception;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test
     * @throws Exception
     */
    public function shouldRegisterTheCandidate(): void
    {
        $authUser = $this->registerUser(
            name: 'User',
            email: "user@user.com",
            password: "123456789"
        );

        $this->assertInstanceOf(UserEntity::class, $authUser);
    }
}
