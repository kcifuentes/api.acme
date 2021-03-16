<?php

namespace Acme\Infrastructure\Http\Requests\Auth;

use Acme\Infrastructure\Http\Requests\BaseRequest;
use JetBrains\PhpStorm\ArrayShape;

class RegisterUserRequest extends BaseRequest
{
    #[ArrayShape(['name' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
    }
}
