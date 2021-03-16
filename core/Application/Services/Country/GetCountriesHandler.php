<?php

namespace Acme\Application\Services\Country;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\Country\CountryFactory;
use Acme\Infrastructure\Eloquent\Repositories\CountryRepository;

class GetCountriesHandler implements Handler
{
    public function __construct(private CountryRepository $countryRepository)
    {
    }

    public function __invoke(Command|GetCountriesCommand $command): array
    {
        return (new CountryFactory)->createFromArray($this->countryRepository->getCountries());
    }
}
