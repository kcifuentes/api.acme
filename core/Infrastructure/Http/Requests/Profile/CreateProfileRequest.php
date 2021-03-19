<?php

namespace Acme\Infrastructure\Http\Requests\Profile;

use Acme\Infrastructure\Http\Requests\BaseRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateProfileRequest extends BaseRequest
{
    #[ArrayShape([
        'first_name' => "string",
        'middle_name' => "string",
        'last_names' => "string",
        'document_type' => "array",
        'document_number' => "string",
        'address' => "string",
        'phone' => "string",
        'city' => "array",
        'profile_type' => "string"
    ])]
    public function rules(): array
    {
        return [
            'first_name'      => 'required|string',
            'middle_name'     => 'required|string',
            'last_names'      => 'required|string',
            'document_type'   => 'required|array',
            'document_number' => 'required|string',
            'address'         => 'required|string',
            'phone'           => 'required|string',
            'city'            => 'required|array',
            'profile_type'    => 'required|array',
        ];
    }
}
