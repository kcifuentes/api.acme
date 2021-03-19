<?php

namespace Acme\Application\Services\ProfileType;

use Acme\Application\Contracts\Command;
use Acme\Domain\ProfileType\ProfileTypeEntity;
use Acme\Domain\ProfileType\ProfileTypeFactory;
use Acme\Infrastructure\Eloquent\Models\ProfileTypeRepository;

class GetAllProfileTypesHandler implements \Acme\Application\Contracts\Handler
{
    public function __construct(private ProfileTypeRepository $profileTypeRepository)
    {
    }

    public function __invoke(Command $command): ProfileTypeEntity|array
    {
        return (new ProfileTypeFactory)
            ->createFromArray($this->profileTypeRepository->getAllProfileTypes());
    }
}
