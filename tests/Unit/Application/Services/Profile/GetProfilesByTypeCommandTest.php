<?php

namespace Tests\Unit\Application\Services\Profile;

use Acme\Application\Services\City\GetCitiesByStateIdCommand;
use Acme\Application\Services\DocumentType\GetDocumentTypeByIdCommand;
use Acme\Application\Services\Profile\CreateProfileCommand;
use Acme\Application\Services\Profile\GetProfilesByTypeCommand;
use Acme\Domain\City\CityEntity;
use Acme\Domain\Profile\DocumentTypeEntity;
use Acme\Domain\Profile\ProfileEntity;
use Acme\Infrastructure\Eloquent\Models\ProfileType;
use Tests\TestCase;

class GetProfilesByTypeCommandTest extends TestCase
{
    /** @test */
    public function get_all_profiles_by_type(): void
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

        $this->commandBus->execute($command);

        $command = new GetProfilesByTypeCommand(profile_type_id: ProfileType::PROFILE_TYPE_OWNER);
        $profiles = $this->commandBus->execute($command);

        $this->assertIsArray($profiles);

        /** @var ProfileEntity $profile */
        foreach ($profiles as $profile) {
            $this->assertInstanceOf(ProfileEntity::class, $profile);
        }
    }
}
