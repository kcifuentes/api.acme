<?php

namespace Acme\Application\Services\City;

use Acme\Application\Contracts\Command;

class GetCitiesByStateIdCommand implements Command
{
    public function __construct(private int $state_id)
    {
    }

    public function getStateId(): int
    {
        return $this->state_id;
    }
}
