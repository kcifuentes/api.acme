<?php

namespace Acme\Application\Services\Auth;

use Acme\Application\Contracts\Command;

class RegisterUserCommand implements Command
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
