<?php

namespace Acme\Infrastructure\Http\Controllers;

use Acme\Application\Services\Profile\GetProfilesByTypeCommand;
use Acme\Infrastructure\Http\Requests\Profile\GetProfilesRequest;
use Illuminate\Http\JsonResponse;

class GetProfilesController extends Controller
{
    public function __invoke(GetProfilesRequest $request): JsonResponse
    {
        return $this->responseData(
            $this->commandBus->execute(
                new GetProfilesByTypeCommand(profile_type_id: $request->get('profile_type_id'))
            )
        );
    }
}
