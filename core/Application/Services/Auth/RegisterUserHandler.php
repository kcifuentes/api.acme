<?php

namespace Acme\Application\Services\Auth;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\User\UserEntity;
use Acme\Domain\User\UserFactory;
use Acme\Infrastructure\Bus\Contracts\CommandBus;
use Acme\Infrastructure\Eloquent\Repositories\UserRepository;

class RegisterUserHandler implements Handler
{
    public function __construct(private UserRepository $repository, private CommandBus $commandBus)
    {
    }

    public function __invoke(Command|RegisterUserCommand $command): UserEntity
    {
        $candidateEntity = new UserEntity();
        $candidateEntity->setName($command->getName());
        $candidateEntity->setEmail($command->getEmail());

        $user = $this->repository->registerUser($candidateEntity, $command->getPassword());

        return UserFactory::create($user);
    }
}
