<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\IAuthRepository;
use Acme\Infrastructure\Eloquent\Models\User;
use Hash;
use Illuminate\Validation\UnauthorizedException;
use JetBrains\PhpStorm\ArrayShape;

class AuthRepository implements IAuthRepository
{
    public function __construct(private User $userModel)
    {
    }

    #[ArrayShape(['user' => "array", 'token' => "string"])]
    public function login(string $email, string $password): array
    {
        $token = null;

        /** @var User $user */
        $user = $this->userModel
            ->where('email', $email)
            ->first();

        if (!$user) {
            throw new UnauthorizedException(trans('auth.not_exists'));
        }

        if (!Hash::check($password, $user->password)) {
            throw new UnauthorizedException(trans('auth.failed'));
        }

        $token = $user->createToken('authToken')->accessToken;

        return [
            'user'  => $user->toArray(),
            'token' => $token
        ];
    }
}
