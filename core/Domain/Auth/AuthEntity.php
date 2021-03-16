<?php

namespace Acme\Domain\Auth;

use Acme\Domain\BaseEntity;
use Acme\Domain\Traits\Serializable;
use Acme\Domain\User\UserEntity;
use Acme\Domain\User\UserFactory;

class AuthEntity extends BaseEntity
{
    use Serializable;

    private UserEntity $user;
    private string $token;

    public function getUser(): UserEntity
    {
        return $this->user;
    }

    public function setUser(UserEntity|array $user): void
    {
        if (is_array($user)) {
            $user = UserFactory::create($user);
        }

        $this->user = $user;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}
