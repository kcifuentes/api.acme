<?php

namespace Acme\Domain\Country;

use Acme\Domain\BaseEntity;
use Acme\Domain\EntityId;
use Acme\Domain\Traits\Serializable;
use JetBrains\PhpStorm\Pure;

class CountryEntity extends BaseEntity
{
    use Serializable;

    private EntityId $id;
    private string $name;
    private array $states;

    #[Pure]
    public function getId(): int
    {
        return $this->id->value();
    }

    public function setId(EntityId $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStates(): array
    {
        return $this->states;
    }

    public function setStates(array $states): void
    {
        $this->states = $states;
    }
}
