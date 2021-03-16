<?php

namespace Acme\Domain\Country;

use Acme\Domain\BaseFactory;
use Acme\Domain\EntityId;

class CountryFactory extends BaseFactory
{
    public static function create(array $attributes): CountryEntity
    {
        $country = new CountryEntity();
        $country->setId(new EntityId($attributes['id']));
        $country->setName($attributes['name']);

        if (isset($attributes['states'])) {
            $country->setStates($attributes['states']);
        }

        return $country;
    }
}
