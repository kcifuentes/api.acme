<?php

namespace Acme\Application\Services\Auth;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\Auth\AuthEntity;
use Acme\Domain\Auth\AuthFactory;
use Acme\Infrastructure\Eloquent\Repositories\AuthRepository;

class LoginHandler implements Handler
{
    public function __construct(private AuthRepository $repository)
    {
    }

    public function __invoke(Command|LoginCommand $command): AuthEntity
    {
        return AuthFactory::create($this->repository->login($command->getEmail(), $command->getPassword()));
    }
}
