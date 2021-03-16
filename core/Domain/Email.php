<?php

namespace Acme\Domain;

use Acme\Domain\Exceptions\IncorrectEmailFormatException;
use Acme\Domain\Exceptions\InvalidArgumentException;

class Email
{
    public function __construct(private string $email)
    {
        $this->setEmail($email);
    }

    private function setEmail(string $email): void
    {
        if ($email == null || empty($email)) {
            throw new InvalidArgumentException("The email can't be null or empty");
        }

        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new IncorrectEmailFormatException('Invalid email format');
        }

        $this->email = $email;
    }

    public function value(): string
    {
        return $this->email;
    }
}
