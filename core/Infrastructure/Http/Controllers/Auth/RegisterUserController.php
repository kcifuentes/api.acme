<?php

namespace Acme\Infrastructure\Http\Controllers\Auth;

use Acme\Application\Services\Auth\RegisterUserCommand;
use Acme\Infrastructure\Http\Controllers\Controller;
use Acme\Infrastructure\Http\Requests\Auth\RegisterUserRequest;
use Illuminate\Http\JsonResponse;

class RegisterUserController extends Controller
{
    public function __invoke(RegisterUserRequest $request): JsonResponse
    {
        $command = new RegisterUserCommand(
            name: $request->get('name'),
            email: $request->get('email'),
            password: $request->get('password')
        );

        return $this->responseData(
            $this->commandBus->execute($command)
        );
    }
}
