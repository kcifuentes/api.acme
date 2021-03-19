<?php

namespace Acme\Domain\Profile;

use Acme\Domain\BaseFactory;
use Acme\Domain\EntityId;

class DocumentTypeFactory extends BaseFactory
{

    static function create(array $attributes): DocumentTypeEntity
    {
        $documentType = new DocumentTypeEntity();
        $documentType->setId(new EntityId($attributes['id']));
        $documentType->setName($attributes['name']);

        return $documentType;
    }
}
