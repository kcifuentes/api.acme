<?php

namespace Acme\Application\Services\Auth;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\Auth\AuthEntity;
use Acme\Domain\User\UserEntity;
use Acme\Infrastructure\Bus\Contracts\CommandBus;
use Acme\Infrastructure\Eloquent\Repositories\UserRepository;

class RegisterUserHandler implements Handler
{
    public function __construct(private UserRepository $repository, private CommandBus $commandBus)
    {
    }

    public function __invoke(Command|RegisterUserCommand $command): AuthEntity
    {
        $candidateEntity = new UserEntity();
        $candidateEntity->setName($command->getName());
        $candidateEntity->setEmail($command->getEmail());

        $this->repository->registerUser($candidateEntity, $command->getPassword());
        $loginCommand = new LoginCommand($command->getEmail(), $command->getPassword());

        /** @var AuthEntity $authLogin */
        $authLogin = $this->commandBus->execute($loginCommand);

        return $authLogin;
    }
}
