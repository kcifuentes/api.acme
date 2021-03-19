<?php

namespace Acme\Domain\ProfileType;

use Acme\Domain\BaseFactory;
use Acme\Domain\EntityId;

class ProfileTypeFactory extends BaseFactory
{

    static function create(array $attributes): ProfileTypeEntity
    {
        $documentType = new ProfileTypeEntity();
        $documentType->setId(new EntityId($attributes['id']));
        $documentType->setName($attributes['name']);

        return $documentType;
    }
}
