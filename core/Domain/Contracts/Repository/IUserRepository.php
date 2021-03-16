<?php

namespace Acme\Domain\Contracts\Repository;

use Acme\Domain\User\UserEntity;

interface IUserRepository
{
    public function registerUser(UserEntity $userEntity, string $password): array;
}
