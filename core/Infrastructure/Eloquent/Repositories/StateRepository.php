<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\IStateRepository;
use Acme\Infrastructure\Eloquent\Models\State;

class StateRepository implements IStateRepository
{
    public function __construct(private State $stateModel)
    {
    }

    public function getStatesByCountryId(int $country_id): array
    {
        return $this->stateModel
            ->where('country_id', $country_id)
            ->with('country')->get()->toArray();
    }
}
