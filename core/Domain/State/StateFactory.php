<?php

namespace Acme\Domain\State;

use Acme\Domain\BaseFactory;
use Acme\Domain\EntityId;

class StateFactory extends BaseFactory
{
    static function create(array $attributes): StateEntity
    {
        $state = new StateEntity();

        $state->setId(new EntityId($attributes['id']));
        $state->setName($attributes['name']);
        $state->setCountry($attributes['country']);

        return $state;
    }
}
