<?php

namespace Acme\Domain\Profile;

use Acme\Domain\BaseFactory;
use Acme\Domain\City\CityFactory;
use Acme\Domain\EntityId;
use Acme\Domain\ProfileType\ProfileTypeFactory;

class ProfileFactory extends BaseFactory
{
    static function create(array $attributes): ProfileEntity
    {
        $profileEntity = new ProfileEntity();

        $profileEntity->setId(new EntityId($attributes['id']));
        $profileEntity->setFirstName($attributes['first_name']);
        $profileEntity->setMiddleName($attributes['middle_name']);
        $profileEntity->setLastNames($attributes['last_names']);

        $profileEntity->setDocumentType(DocumentTypeFactory::create($attributes['document_type']));

        $profileEntity->setDocumentNumber($attributes['document_number']);
        $profileEntity->setAddress($attributes['address']);
        $profileEntity->setPhone($attributes['phone']);
        $profileEntity->setCity(CityFactory::create($attributes['city']));
        $profileEntity->setProfileType(ProfileTypeFactory::create($attributes['profile_type']));


        return $profileEntity;
    }
}
