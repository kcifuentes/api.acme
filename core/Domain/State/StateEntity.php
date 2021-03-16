<?php

namespace Acme\Domain\State;

use Acme\Domain\BaseEntity;
use Acme\Domain\Country\CountryEntity;
use Acme\Domain\Country\CountryFactory;
use Acme\Domain\EntityId;
use Acme\Domain\Traits\Serializable;
use JetBrains\PhpStorm\Pure;

class StateEntity extends BaseEntity
{
    use Serializable;

    private EntityId $id;
    private string $name;
    private CountryEntity $country;
    private array $cities;

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

    public function getCountry(): CountryEntity
    {
        return $this->country;
    }

    public function setCountry(CountryEntity|array $country): void
    {
        if (is_array($country)) {
            $country = CountryFactory::create($country);
        }

        $this->country = $country;
    }

    public function getCities(): array
    {
        return $this->cities;
    }

    public function setCities(array $cities): void
    {
        $this->cities = $cities;
    }
}
