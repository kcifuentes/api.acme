<?php

namespace Tests\Unit\Application\Services\City;

use Acme\Application\Services\City\GetCitiesByStateIdCommand;
use Acme\Domain\City\CityEntity;
use Acme\Domain\Country\CountryEntity;
use Acme\Domain\State\StateEntity;
use Tests\TestCase;

class getCitiesByStateIdCommandTest extends TestCase
{
    /** @test */
    public function shouldGetTheListOfCountriesOfAState(): void
    {
        $command = new GetCitiesByStateIdCommand(1);
        $cities = $this->commandBus->execute($command);

        $this->assertNotNull($cities);
        $this->assertNotEmpty($cities);
        $this->assertIsArray($cities);

        /** @var CityEntity $city */
        foreach ($cities as $city) {
            $this->assertInstanceOf(CityEntity::class, $city);
            $this->assertNotNull($city->getId());
            $this->assertNotNull($city->getName());
            $this->assertInstanceOf(StateEntity::class, $city->getState());
            $this->assertInstanceOf(CountryEntity::class, $city->getState()->getCountry());
        }
    }
}
