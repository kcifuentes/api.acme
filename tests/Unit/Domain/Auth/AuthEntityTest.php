<?php

namespace Tests\Unit\Domain\Auth;

use Acme\Domain\Auth\AuthEntity;
use Acme\Domain\Auth\AuthFactory;
use Acme\Domain\User\UserEntity;
use Acme\Domain\User\UserFactory;
use Illuminate\Support\Str;
use Tests\DomainTestCase;

class AuthEntityTest extends DomainTestCase
{
    /** @test */
    public function shouldBeAuthEntityInstance(): void
    {
        $token = Str::random(60);
        $user = UserFactory::create([
            'id'    => 1,
            'name'  => 'user',
            'email' => 'user@user.com',
        ]);

        $authEntity = new AuthEntity();
        $authEntity->setUser($user);
        $authEntity->setToken($token);

        $this->assertInstanceOf(AuthEntity::class, $authEntity);
        $this->assertInstanceOf(UserEntity::class, $authEntity->getUser());
        $this->assertEquals($user, $authEntity->getUser());
        $this->assertEquals($token, $authEntity->getToken());
    }

    /** @test */
    public function shouldBeAuthEntityInstanceFromFactory(): void
    {
        $token = Str::random(60);
        $user = UserFactory::create([
            'id'    => 1,
            'name'  => 'user',
            'email' => 'user@user.com',
        ]);

        $authEntity = AuthFactory::create([
            'user'  => $user,
            'token' => $token
        ]);

        $this->assertInstanceOf(AuthEntity::class, $authEntity);
        $this->assertInstanceOf(UserEntity::class, $authEntity->getUser());
        $this->assertEquals($user, $authEntity->getUser());
        $this->assertEquals($token, $authEntity->getToken());
    }
}
