<?php

namespace Acme\Infrastructure\Http\Requests\Auth;

use Acme\Infrastructure\Http\Requests\BaseRequest;
use JetBrains\PhpStorm\ArrayShape;

class ValidateUserAccountRequest extends BaseRequest
{
    #[ArrayShape(['user_id' => "string", 'validation_code' => "string"])]
    public function rules(): array
    {
        return [
            'validation_code' => 'required|exists:users,verification_code'
        ];
    }
}
