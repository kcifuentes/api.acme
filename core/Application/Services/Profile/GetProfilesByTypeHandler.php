<?php

namespace Acme\Application\Services\Profile;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\Profile\ProfileFactory;
use Acme\Infrastructure\Eloquent\Repositories\ProfileRepository;

class GetProfilesByTypeHandler implements Handler
{
    public function __construct(private ProfileRepository $profileRepository)
    {
    }

    public function __invoke(Command|GetProfilesByTypeCommand $command): array
    {
        return (new ProfileFactory)->createFromArray(
            $this->profileRepository->getProfilesByType($command->getProfileTypeId())
        );
    }
}
