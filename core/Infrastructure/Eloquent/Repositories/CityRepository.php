<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\ICityRepository;
use Acme\Infrastructure\Eloquent\Models\City;

class CityRepository implements ICityRepository
{
    public function __construct(private City $cityModel)
    {
    }

    public function getCitiesByStateId(int $state_id): array
    {
        return $this->cityModel
            ->where('state_id', $state_id)
            ->with('state.country')
            ->get()
            ->toArray();
    }

    public function getAllCities(): array
    {
        return $this->cityModel->with('state.country')->get()->toArray();
    }
}
