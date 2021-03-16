<?php

namespace Acme\Application\Services\Auth;

use Acme\Application\Contracts\Command;

class LoginCommand implements Command
{
    public function __construct(private string $email, private string $password)
    {
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
