<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\ICountryRepository;
use Acme\Infrastructure\Eloquent\Models\Country;

class CountryRepository implements ICountryRepository
{
    public function __construct(
        private Country $countryModel
    )
    {
    }

    public function getCountries(): array
    {
        return $this->countryModel->all()->toArray();
    }
}
