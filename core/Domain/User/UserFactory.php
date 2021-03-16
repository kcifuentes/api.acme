<?php

namespace Acme\Domain\User;

use Acme\Domain\BaseFactory;
use Acme\Domain\EntityId;

class UserFactory extends BaseFactory
{
    static function create(array $attributes): UserEntity
    {
        $userEntity = new UserEntity();

        $userEntity->setId(new EntityId((int)$attributes['id']));
        $userEntity->setName($attributes['name']);
        $userEntity->setEmail($attributes['email']);

        return $userEntity;
    }
}
