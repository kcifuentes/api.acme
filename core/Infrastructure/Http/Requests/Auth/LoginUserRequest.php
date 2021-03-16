<?php

namespace Acme\Infrastructure\Http\Requests\Auth;

use Acme\Infrastructure\Http\Requests\BaseRequest;
use JetBrains\PhpStorm\ArrayShape;

class LoginUserRequest extends BaseRequest
{
    #[ArrayShape(['email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string',
        ];
    }
}
