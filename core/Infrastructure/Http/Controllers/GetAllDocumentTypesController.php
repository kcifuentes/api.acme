<?php

namespace Acme\Infrastructure\Http\Controllers;

use Acme\Application\Services\DocumentType\GetAllDocumentTypesCommand;
use Illuminate\Http\JsonResponse;

class GetAllDocumentTypesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return $this->responseData(
            $this->commandBus->execute(new GetAllDocumentTypesCommand())
        );
    }
}
