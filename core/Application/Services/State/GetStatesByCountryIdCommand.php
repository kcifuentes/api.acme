<?php

namespace Acme\Application\Services\State;

use Acme\Application\Contracts\Command;

class GetStatesByCountryIdCommand implements Command
{
    public function __construct(private int $country_id)
    {
    }

    public function getCountryId(): int
    {
        return $this->country_id;
    }
}
