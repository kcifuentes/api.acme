<?php

namespace Acme\Infrastructure\Http\Controllers\Auth;

use Acme\Application\Services\Auth\LoginCommand;
use Acme\Infrastructure\Http\Controllers\Controller;
use Acme\Infrastructure\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Http\JsonResponse;

class LoginUserController extends Controller
{
    public function __invoke(LoginUserRequest $request): JsonResponse
    {
        $command = new LoginCommand(
            email: $request->get('email'),
            password: $request->get('password')
        );

        return $this->responseData($this->commandBus->execute($command));
    }
}
