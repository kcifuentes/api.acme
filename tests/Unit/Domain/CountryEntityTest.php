<?php

namespace Tests\Unit\Domain;

use Acme\Domain\City\CityEntity;
use Acme\Domain\Country\CountryEntity;
use Acme\Domain\EntityId;
use Acme\Domain\State\StateEntity;
use Tests\TestCase;

class CountryEntityTest extends TestCase
{
    /** @test */
    public function shouldBeACountryEntityInstance(): void
    {
        $country = new CountryEntity();
        $this->assertInstanceOf(CountryEntity::class, $country);
    }

    /** @test */
    public function shouldBeACountryEntityInstanceWithStatesAndCities(): void
    {
        $country = new CountryEntity();
        $country->setId(new EntityId(1));
        $country->setName('Colombia');

        $state = new StateEntity();
        $state->setName('Atlántico');
        $country->setStates([$state]);

        $city = new CityEntity();
        $city->setName('Barranquilla');
        $state->setCities([$city]);

        /** @var StateEntity $state */
        foreach ($country->getStates() as $state) {
            $this->assertInstanceOf(StateEntity::class, $state);
            $this->assertEquals('Atlántico', $state->getName());

            /** @var CityEntity $cityItem */
            foreach ($state->getCities() as $cityItem) {
                $this->assertEquals($city->getName(), $cityItem->getName());
            }
        }

        $this->assertEquals(1, $country->getId());
        $this->assertEquals('Colombia', $country->getName());
        $this->assertIsArray($country->toArray());
    }

    /** @test */
    public function shouldBeCreatStateEntityWithCountry(): void
    {
        $country = new CountryEntity();
        $country->setName('Colombia');

        $state = new StateEntity();
        $state->setName('Atlántico');
        $state->setCountry($country);

        $this->assertInstanceOf(CountryEntity::class, $state->getCountry());
    }

    /** @test */
    public function shouldBeCreatCityEntityWithState(): void
    {
        $state = new StateEntity();
        $state->setName('Atlántico');

        $city = new CityEntity();
        $city->setName('Barranquilla');
        $city->setState($state);

        $this->assertInstanceOf(StateEntity::class, $city->getState());
    }
}
