<?php

namespace Acme\Domain\Contracts\Repository;

interface ICountryRepository
{
    public function getCountries(): array;
}
