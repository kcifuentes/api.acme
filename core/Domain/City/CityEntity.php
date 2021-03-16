<?php

namespace Acme\Domain\City;

use Acme\Domain\BaseEntity;
use Acme\Domain\EntityId;
use Acme\Domain\State\StateEntity;
use Acme\Domain\Traits\Serializable;
use JetBrains\PhpStorm\Pure;

class CityEntity extends BaseEntity
{
    use Serializable;

    private EntityId $id;
    private string $name;
    private StateEntity $state;

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

    public function getState(): StateEntity
    {
        return $this->state;
    }

    public function setState(StateEntity $state): void
    {
        $this->state = $state;
    }
}
