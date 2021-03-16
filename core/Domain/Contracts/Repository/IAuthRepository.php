<?php

namespace Acme\Domain\Contracts\Repository;

interface IAuthRepository
{
    public function login(string $email, string $password): array;
}
