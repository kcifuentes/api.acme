<?php

namespace Acme\Domain\Contracts\Repository;

interface ICityRepository
{
    public function getCitiesByStateId(int $state_id): array;
}
