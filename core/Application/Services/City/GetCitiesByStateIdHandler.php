<?php

namespace Acme\Application\Services\City;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\City\CityFactory;
use Acme\Infrastructure\Eloquent\Repositories\CityRepository;

class GetCitiesByStateIdHandler implements Handler
{
    public function __construct(private CityRepository $cityRepository)
    {
    }

    public function __invoke(Command|GetCitiesByStateIdCommand $command): array
    {
        return (new CityFactory)->createFromArray(
            $this->cityRepository->getCitiesByStateId($command->getStateId())
        );
    }
}
