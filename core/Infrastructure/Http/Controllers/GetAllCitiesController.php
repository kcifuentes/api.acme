<?php

namespace Acme\Infrastructure\Http\Controllers;

use Acme\Application\Services\City\GetAllCitiesCommand;
use Illuminate\Http\JsonResponse;

class GetAllCitiesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return $this->responseData(
            $this->commandBus->execute(new GetAllCitiesCommand())
        );
    }
}
