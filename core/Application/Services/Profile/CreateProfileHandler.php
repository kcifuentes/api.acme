<?php

namespace Acme\Application\Services\Profile;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\Profile\ProfileEntity;
use Acme\Domain\Profile\ProfileFactory;
use Acme\Infrastructure\Eloquent\Repositories\ProfileRepository;

class CreateProfileHandler implements Handler
{
    public function __construct(private ProfileRepository $profileRepository)
    {
    }

    public function __invoke(Command|CreateProfileCommand $command): ProfileEntity
    {
        return ProfileFactory::create($this->profileRepository->createNewProfile($command->toArray()));
    }
}
