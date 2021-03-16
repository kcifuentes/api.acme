<?php

namespace Acme\Domain\User;

use Acme\Domain\BaseEntity;
use Acme\Domain\Email;
use Acme\Domain\EntityId;
use Acme\Domain\Exceptions\InvalidArgumentException;
use Acme\Domain\Traits\Serializable;
use JetBrains\PhpStorm\Pure;

class UserEntity extends BaseEntity
{
    use Serializable;

    private ?EntityId $id;
    private string $name;
    private Email $email;

    #[Pure] public function getId(): ?int
    {
        return $this->id->value();
    }

    public function setId(?EntityId $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (!$this->assertExists($name)) {
            throw new InvalidArgumentException();
        }

        $this->name = $name;
    }

    #[Pure] public function getEmail(): string
    {
        return $this->email->value();
    }

    public function setEmail(string $email): void
    {
        if (!$this->assertExists($email)) {
            throw new InvalidArgumentException();
        }

        if (is_string($email)) {
            $email = new Email($email);
        }

        $this->email = $email;
    }

}
