<?php

namespace Acme\Infrastructure\Http\Controllers;

use Acme\Application\Services\ProfileType\GetAllProfileTypesCommand;
use Illuminate\Http\JsonResponse;

class GetAllProfileTypesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return $this->responseData($this->commandBus->execute(new GetAllProfileTypesCommand()));
    }
}
