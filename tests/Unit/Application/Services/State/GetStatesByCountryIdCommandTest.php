<?php

namespace Tests\Unit\Application\Services\State;

use Acme\Application\Services\State\GetStatesByCountryIdCommand;
use Acme\Domain\Country\CountryEntity;
use Acme\Domain\State\StateEntity;
use Tests\TestCase;

class GetStatesByCountryIdCommandTest extends TestCase
{
    /** @test */
    public function shouldGetTheListOfStatesOfACountry(): void
    {
        $command = new GetStatesByCountryIdCommand(1);
        $states = $this->commandBus->execute($command);

        $this->assertNotNull($states);
        $this->assertNotEmpty($states);
        $this->assertIsArray($states);

        /** @var StateEntity $state */
        foreach ($states as $state) {
            $this->assertInstanceOf(StateEntity::class, $state);
            $this->assertNotNull($state->getId());
            $this->assertNotNull($state->getName());
            $this->assertInstanceOf(CountryEntity::class, $state->getCountry());
        }
    }
}
