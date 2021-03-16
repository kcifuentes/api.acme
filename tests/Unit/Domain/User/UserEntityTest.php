<?php

namespace Tests\Unit\Domain\User;

use Acme\Domain\Exceptions\InvalidArgumentException;
use Acme\Domain\User\UserEntity;
use Acme\Domain\User\UserFactory;
use Tests\DomainTestCase;

class UserEntityTest extends DomainTestCase
{
    /** @test */
    public function shouldBeUserEntityInstance(): void
    {
        $userEntity = new UserEntity();

        $this->assertInstanceOf(UserEntity::class, $userEntity);
    }

    /** @test */
    public function shouldBeUserEntityInstanceFromCreateFactory(): void
    {
        $userEntity = UserFactory::create([
            'id'    => 1,
            'name'  => 'user',
            'email' => 'user@user.com',
        ]);

        $this->assertInstanceOf(UserEntity::class, $userEntity);

        $this->assertNotEmpty($userEntity->getId());
        $this->assertNotEmpty($userEntity->getName());
        $this->assertNotEmpty($userEntity->getEmail());
    }

    /** @test */
    public function shouldBeUserEntityInstanceFromArrayFactory(): void
    {
        $userEntities = (new UserFactory)->createFromArray([
            [
                'id'    => 1,
                'name'  => 'user',
                'email' => 'user@user.com',
            ]
        ]);

        foreach ($userEntities as $userEntity) {
            $this->assertInstanceOf(UserEntity::class, $userEntity);
        }
    }

    /** @test */
    public function shouldBeArrayFromUserEntity(): void
    {
        $userEntity = UserFactory::create([
            'id'    => 1,
            'name'  => 'user',
            'email' => 'user@user.com',
        ]);

        $this->assertIsArray($userEntity->toArray());
    }

    /** @test */
    public function shouldReturnInvalidArgumentExceptionForEmptyName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $userEntity = new UserEntity();
        $userEntity->setName('');
    }

    /** @test */
    public function shouldReturnInvalidArgumentExceptionForEmptyEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $userEntity = new UserEntity();

        $userEntity->setEmail('');
    }
}
