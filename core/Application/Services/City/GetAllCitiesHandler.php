<?php

namespace Acme\Application\Services\City;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\BaseEntity;
use Acme\Domain\City\CityFactory;
use Acme\Infrastructure\Eloquent\Repositories\CityRepository;

class GetAllCitiesHandler implements Handler
{
    public function __construct(private CityRepository $cityRepository)
    {
    }

    public function __invoke(Command|GetAllCitiesCommand $command): BaseEntity|array
    {
        return (new CityFactory)->createFromArray($this->cityRepository->getAllCities());
    }
}
