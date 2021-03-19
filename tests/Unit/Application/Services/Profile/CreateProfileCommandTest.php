<?php

namespace Tests\Unit\Application\Services\Profile;

use Acme\Application\Services\City\GetCitiesByStateIdCommand;
use Acme\Application\Services\DocumentType\GetDocumentTypeByIdCommand;
use Acme\Application\Services\Profile\CreateProfileCommand;
use Acme\Domain\City\CityEntity;
use Acme\Domain\Profile\DocumentTypeEntity;
use Acme\Domain\Profile\ProfileEntity;
use Acme\Infrastructure\Eloquent\Models\ProfileType;
use Tests\TestCase;

class CreateProfileCommandTest extends TestCase
{
    /** @test */
    public function create_owner(): void
    {
        $documentTypeCommand = new GetDocumentTypeByIdCommand(id: 1);
        /** @var DocumentTypeEntity $documentTypeEntity */
        $documentTypeEntity = $this->commandBus->execute($documentTypeCommand);

        $this->assertInstanceOf(DocumentTypeEntity::class, $documentTypeEntity);

        $cityCommand = new GetCitiesByStateIdCommand(1);
        /** @var CityEntity[] $cityEntity */
        $cityEntity = $this->commandBus->execute($cityCommand);

        $command = new CreateProfileCommand(
            first_name: 'User',
            middle_name: 'Name',
            last_names: 'Test',
            document_type_id: $documentTypeEntity->getId(),
            document_number: '12345678998',
            address: 'CRA 24',
            phone: '34542343',
            city_id: $cityEntity[0]->getId(),
            profile_type_id: ProfileType::PROFILE_TYPE_OWNER,
        );

        /** @var ProfileEntity $profileEntity */
        $profileEntity = $result = $this->commandBus->execute($command);

        $this->assertInstanceOf(ProfileEntity::class, $profileEntity);
        $this->assertEquals('User', $profileEntity->getFirstName());
        $this->assertEquals('Name', $profileEntity->getMiddleName());
        $this->assertEquals('Test', $profileEntity->getLastNames());
        $this->assertEquals($documentTypeEntity->getName(), $profileEntity->getDocumentType()->getName());
        $this->assertEquals('12345678998', $profileEntity->getDocumentNumber());
        $this->assertEquals('CRA 24', $profileEntity->getAddress());
        $this->assertEquals('34542343', $profileEntity->getPhone());
        $this->assertEquals($cityEntity[0]->getName(), $profileEntity->getCity()->getName());
        $this->assertEquals(ProfileType::PROFILE_TYPE_OWNER, $profileEntity->getProfileType()->getId());
    }
}
