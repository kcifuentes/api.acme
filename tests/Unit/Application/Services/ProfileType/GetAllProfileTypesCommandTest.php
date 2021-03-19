<?php

namespace Tests\Unit\Application\Services\ProfileType;

use Acme\Application\Services\ProfileType\GetAllProfileTypesCommand;
use Acme\Domain\ProfileType\ProfileTypeEntity;
use Tests\TestCase;

class GetAllProfileTypesCommandTest extends TestCase
{
    /** @test */
    public function should_get_all_profile_types(): void
    {
        $command = new GetAllProfileTypesCommand();
        $profileTypes = $this->commandBus->execute($command);

        /** @var ProfileTypeEntity $profileType */
        foreach ($profileTypes as $profileType) {
            $this->assertNotNull($profileType->getId());
            $this->assertNotNull($profileType->getName());
        }
    }
}
