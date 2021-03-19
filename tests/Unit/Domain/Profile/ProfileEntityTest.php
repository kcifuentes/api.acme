<?php

namespace Tests\Unit\Domain\Profile;

use Acme\Domain\City\CityEntity;
use Acme\Domain\EntityId;
use Acme\Domain\Profile\DocumentTypeEntity;
use Acme\Domain\Profile\ProfileEntity;
use Acme\Domain\ProfileType\ProfileTypeEntity;
use Acme\Domain\State\StateEntity;
use Acme\Infrastructure\Eloquent\Models\ProfileType;
use Tests\DomainTestCase;

class ProfileEntityTest extends DomainTestCase
{
    /** @test */
    public function create_owner_entity(): void
    {
        $documentType = new DocumentTypeEntity();
        $documentType->setId(new EntityId(1));
        $documentType->setName('Cédula de Ciudadanía');

        $state = new StateEntity();
        $state->setName('Atlántico');

        $city = new CityEntity();
        $city->setName('Barranquilla');
        $state->setCities([$city]);

        $profileType = new ProfileTypeEntity();
        $profileType->setId(new EntityId(ProfileType::PROFILE_TYPE_OWNER));
        $profileType->setName('owner');

        $profile = new ProfileEntity();
        $profile->setId(new EntityId(1));
        $profile->setFirstName('Owner');
        $profile->setMiddleName('User');
        $profile->setLastNames('Test');
        $profile->setDocumentType($documentType);
        $profile->setDocumentNumber('98629639');
        $profile->setAddress('Cra 5C #32 - 12');
        $profile->setPhone('3154668976');
        $profile->setCity($city);
        $profile->setProfileType($profileType);

        $this->assertInstanceOf(DocumentTypeEntity::class, $documentType);
        $this->assertInstanceOf(ProfileEntity::class, $profile);

        // La idea es crear una función aparte para este grupo de test, pero por cuestiones de tiempo decidí
        // hacerlo en el mismo método.
        $this->assertEquals(1, $profile->getId());
        $this->assertEquals('Owner', $profile->getFirstName());
        $this->assertEquals('User', $profile->getMiddleName());
        $this->assertEquals('Test', $profile->getLastNames());
        $this->assertEquals(1, $profile->getDocumentType()->getId());
        $this->assertEquals('Cédula de Ciudadanía', $profile->getDocumentType()->getName());
        $this->assertEquals('98629639', $profile->getDocumentNumber());
        $this->assertEquals('Cra 5C #32 - 12', $profile->getAddress());
        $this->assertEquals('3154668976', $profile->getPhone());
        $this->assertEquals('Barranquilla', $profile->getCity()->getName());
        $this->assertEquals('owner', $profile->getProfileType()->getName());
    }
}
