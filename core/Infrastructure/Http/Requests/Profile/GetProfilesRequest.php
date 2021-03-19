<?php

namespace Acme\Infrastructure\Http\Requests\Profile;

use Acme\Infrastructure\Http\Requests\BaseRequest;
use JetBrains\PhpStorm\ArrayShape;

class GetProfilesRequest extends BaseRequest
{
    #[ArrayShape(['profile_type_id' => "integer"])]
    public function rules(): array
    {
        return [
            'profile_type_id' => 'required|integer'
        ];
    }
}
