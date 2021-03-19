<?php

namespace Tests\Unit\Application\Services\City;

use Acme\Application\Services\City\GetAllCitiesCommand;
use Acme\Domain\City\CityEntity;
use Acme\Domain\Country\CountryEntity;
use Acme\Domain\State\StateEntity;

class getAllCitiesCommandTest extends \Tests\TestCase
{
    /** @test */
    public function should_get_all_cities()
    {
        $cities = $this->commandBus->execute(new GetAllCitiesCommand());

        $this->assertIsArray($cities);
        /** @var CityEntity $city */
        foreach ($cities as $city) {
            $this->assertInstanceOf(CityEntity::class, $city);
            $this->assertInstanceOf(StateEntity::class, $city->getState());
            $this->assertInstanceOf(CountryEntity::class, $city->getState()->getCountry());
        }
    }
}
