<?php

namespace Acme\Domain\Auth;

use Acme\Domain\BaseFactory;

class AuthFactory extends BaseFactory
{
    static function create(array $attributes): AuthEntity
    {
        $authEntity = new AuthEntity();
        $authEntity->setUser($attributes['user']);
        $authEntity->setToken($attributes['token']);

        return $authEntity;
    }
}
