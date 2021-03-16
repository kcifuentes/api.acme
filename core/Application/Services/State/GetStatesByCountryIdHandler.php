<?php

namespace Acme\Application\Services\State;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\State\StateFactory;
use Acme\Infrastructure\Eloquent\Repositories\StateRepository;

class GetStatesByCountryIdHandler implements Handler
{
    public function __construct(private StateRepository $cityRepository)
    {
    }

    public function __invoke(Command|GetStatesByCountryIdCommand $command): array
    {
        return (new StateFactory)->createFromArray(
            $this->cityRepository->getStatesByCountryId($command->getCountryId())
        );
    }
}
