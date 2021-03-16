<?php

namespace Acme\Domain\Contracts\Repository;

interface IStateRepository
{
    public function getStatesByCountryId(int $country_id): array;
}
