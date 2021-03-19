<?php

namespace Acme\Infrastructure\Http\Controllers;

use Acme\Application\Services\Profile\CreateProfileCommand;
use Acme\Infrastructure\Http\Requests\Profile\CreateProfileRequest;
use Illuminate\Http\JsonResponse;

class CreateProfileController extends Controller
{
    public function __invoke(CreateProfileRequest $request): JsonResponse
    {
        $command = new CreateProfileCommand(
            first_name: $request->get('first_name'),
            middle_name: $request->get('middle_name'),
            last_names: $request->get('last_names'),
            document_type_id: $request->get('document_type')['id'],
            document_number: $request->get('document_number'),
            address: $request->get('address'),
            phone: $request->get('phone'),
            city_id: $request->get('city')['id'],
            profile_type_id: $request->get('profile_type')['id'],
        );

        return $this->responseData($this->commandBus->execute($command));
    }
}
