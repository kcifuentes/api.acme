<?php

namespace Tests\Unit\Application\Services\Country;

use Acme\Application\Services\Country\GetCountriesCommand;
use Acme\Domain\Country\CountryEntity;
use Tests\TestCase;

class GetCountriesCommandTest extends TestCase
{

    /** @test */
    public function shouldObtainTheListFfCountries(): void
    {
        $command = new GetCountriesCommand();
        $countries = $this->commandBus->execute($command);

        $this->assertNotNull($countries);
        $this->assertNotEmpty($countries);
        $this->assertIsArray($countries);

        /** @var CountryEntity $country */
        foreach ($countries as $country) {
            $this->assertInstanceOf(CountryEntity::class, $country);
            $this->assertNotNull($country->getName());
        }
    }
}
