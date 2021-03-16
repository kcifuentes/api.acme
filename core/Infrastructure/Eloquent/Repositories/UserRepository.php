<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\ICandidateRepository;
use Acme\Domain\Contracts\Repository\IUserRepository;
use Acme\Domain\User\UserEntity;
use Acme\Infrastructure\Eloquent\Models\User;
use Hash;

class UserRepository implements IUserRepository
{
    public function __construct(private User $userModel)
    {
    }

    public function registerUser(UserEntity $userEntity, string $password): array
    {
        $this->userModel->fill($userEntity->toArray());
        $this->userModel->password = Hash::make($password);

        $this->userModel->save();
        return $this->userModel->toArray();
    }
}
