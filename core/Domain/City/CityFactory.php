<?php

namespace Acme\Domain\City;

use Acme\Domain\BaseFactory;
use Acme\Domain\EntityId;
use Acme\Domain\State\StateFactory;

class CityFactory extends BaseFactory
{

    static function create(array $attributes): CityEntity
    {
        $city = new CityEntity();
        $city->setId(new EntityId($attributes['id']));
        $city->setName($attributes['name']);
        $city->setState(StateFactory::create($attributes['state']));

        return $city;
    }
}
