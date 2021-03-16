<?php

namespace Tests\Unit\Application\Services\Auth;

use Acme\Domain\Auth\AuthEntity;
use Exception;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test
     * @throws Exception
     */
    public function shouldRegisterTheCandidate(): void
    {
        $authUser = $this->registerUser();

        $this->assertInstanceOf(AuthEntity::class, $authUser);
    }
}
